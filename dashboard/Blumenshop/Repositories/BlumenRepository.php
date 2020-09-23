<?php

require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\MySqlDatabase.php';

class BlumenRepository
{
    /**
     * @var DatabaseInterface $database
     */
    private DatabaseInterface $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;

    }

    public function getSelectAllBlumenQuery()
    {
        return $stmt = $this->database->query('SELECT * FROM blumen');

    }

    public function getAusgewaehlteBlume($name)
    {
        $blume = [];
        $sql = 'SELECT * FROM blumen WHERE name=:name';
        $stmt = $this->database->prepare($sql);
        $stmt->execute(['name' => $name]);
        $blume[] = $stmt->fetch(PDO::FETCH_ASSOC);
        return $blume;
    }

    private function getBlumeExistiertByName($name): bool
    {
        $sql = 'SELECT * FROM blumen WHERE name=:name';
        $stmt = $this->database->prepare($sql);
        $stmt->execute(['name' => $name]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return false;
        }
        return true;
    }

    private function alleBlumenAnzeigen()
    {
        $stmt = $this->getSelectAllBlumenQuery();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $row['name'] . '<br>';
        }
    }


    public function getAllBlumen()
    {
        $blumenArray = [];
        $stmt = $this->getSelectAllBlumenQuery();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $blumenArray [] = $row;
        }
        return $blumenArray;
    }

    public function persistiereBlumeInDatenbank()
    {

        $name = $_POST['blumename'];
        $preis = $_POST['preis'];
        $kriterienInString = implode(',', $_POST['kriterienAuswahl']);  //Array in String
        $werte = $_POST['wert'];

        if (!$this->getBlumeExistiertByName($name)) {

            $sql = 'INSERT INTO blumen(name, preis, attribut, wert) VALUES (:name, :preis, :kriterienInString,:werte)';
            $stmt = $this->database->prepare($sql);
            $stmt->execute(['name' => $name, 'preis' => $preis, 'kriterienInString' => $kriterienInString, 'werte' => $werte]);
            echo 'Neue Blume erfolgreich hinzugefügt';
        } else {
            echo 'Blume: ' . $name . ' existiert bereits';
        }
    }

    public function updateBlumeAusDatenbank($blumename)
    {

        $alteBlume = $_POST['alteBlume'];

        $sql = 'UPDATE blumen SET name =:blumename WHERE name =:alteBlume';
        $stmt = $this->database->prepare($sql);
        $stmt->execute(['blumename' => $blumename, 'alteBlume' => $alteBlume]);
        echo 'Die Blume wurde aktualisiert';


    }

    public function loescheBlumeAusDatenbank()
    {
        $name = $_POST['loescheBlumeAusDerAuswahl'];
        $sql = 'DELETE FROM blumen WHERE name = :name';
        $stmt = $this->database->prepare($sql);
        $stmt->execute(['name' => $name]);
        echo 'Die Blume wurde aus dem Sortiment entfernt';
    }
}