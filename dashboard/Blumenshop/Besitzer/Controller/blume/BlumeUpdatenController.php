<?php

use dashboard\Blumenshop\MySqlDatabase;

require 'C:\xampp2\htdocs\dashboard\Blumenshop\MySqlDatabase.php';
require 'C:\xampp2\htdocs\dashboard\Blumenshop\Repositories\BlumenRepository.php';
require 'C:\xampp2\htdocs\dashboard\Blumenshop\Repositories\KriterienRepository.php';

class BlumeUpdatenController
{
    /**
     * @var BlumenRepository $blumenrepository
     */
    private BlumenRepository $blumenrepository;

    /**
     * @var KriterienRepository $kriterienrepository
     */
    private KriterienRepository $kriterienrepository;

    /**
     * @return BlumenRepository
     */
    public function getBlumenrepository(): BlumenRepository
    {
        return $this->blumenrepository;
    }

    /**
     * @param BlumenRepository $blumenrepository
     */
    public function setBlumenrepository(BlumenRepository $blumenrepository): void
    {
        $this->blumenrepository = $blumenrepository;
    }

    /**
     * @return KriterienRepository
     */
    public function getKriterienrepository(): KriterienRepository
    {
        return $this->kriterienrepository;
    }

    /**
     * @param KriterienRepository $kriterienrepository
     */
    public function setKriterienrepository(KriterienRepository $kriterienrepository): void
    {
        $this->kriterienrepository = $kriterienrepository;
    }


    public function __construct(BlumenRepository $blumenRepository, KriterienRepository $kriterienRepository)
    {
        $this->blumenrepository = $blumenRepository;
        $this->kriterienrepository = $kriterienRepository;
    }

    public function blumeUpdaten($blumename)
    {
        $alteBlume = $blumename;
        $kriterien = $this->kriterienrepository->getAllKriterien();
        $blumen = $this->blumenrepository->getAllBlumen();
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Views\blume\blumeUpdaten.php';
    }
}

$mySQlDatabase = new MySqlDatabase();
$blumenrepository = new BlumenRepository($mySQlDatabase);
$kriterienrepository = new KriterienRepository($mySQlDatabase);
$blumeUpdatenController = new BlumeUpdatenController($blumenrepository, $kriterienrepository);


if (!empty($_POST['blumenameNeu']) && !empty($_POST['kriterienAuswahl']) && !empty($_POST['wert']) && !empty($_POST['preis'])) {
    $blumeUpdatenController->getBlumenrepository()->updateBlumeAusDatenbank($_POST['blumenameNeu']);
    $_POST['UpdateBlume'] = '';
    $_POST['kriterienAuswahl'] = '';
    $_POST['wert'] = '';
    $_POST['preis'] = '';
    $_POST['blumenameNeu'] = '';
    //   include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\index.php';
}

if (!empty($_POST['UpdateBlume'])) {
    $blumeUpdatenController->blumeUpdaten($_POST['UpdateBlume']);  //Name der Blume die upgedatet werden soll

}

if (empty($_POST['UpdateBlume'])) {
    echo '<div>';
    echo '<a href="/dashboard/Blumenshop/Besitzer/index.php">Zurück ins Besitzermenü</a>';
    echo '</div>';
}

//$blumeUpdatenController->blumeUpdaten();