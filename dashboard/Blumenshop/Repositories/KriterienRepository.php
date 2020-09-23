<?php

require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\MySqlDatabase.php';

class KriterienRepository
{
    /**
     * @var DatabaseInterface $database
     */
    private DatabaseInterface $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
    }

    public function getAllKriterien()
    {
        $kriterien = [];
        $sql = 'SELECT * FROM kriterien';
        $stmt = $this->database->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $kriterien [] = $row['kriterium'];
        }
        return $kriterien;
    }

    public function persistiereKriteriumInDatenbank($kriterium) //als Parameter übergeben statt post
    {

        //  $kriterium = $_POST['kriterium'];
        $sql = 'INSERT INTO kriterien(kriterium) VALUES (:kriterium)';
        $stmt = $this->database->prepare($sql);
        $stmt->execute(['kriterium' => $kriterium]);
        echo 'Neues Kriterium erfolgreich hinzugefügt';
    }

    // public function getAllKriterien() {
    //   $result = $this->database->query("SELECT * from kriterien");
    //  $kriterien = [];
    // foreach($result as $row) {
    //    $kriterien[] = new Kriterium($row);
    //    }
    // return $kriterien;
    // }
}