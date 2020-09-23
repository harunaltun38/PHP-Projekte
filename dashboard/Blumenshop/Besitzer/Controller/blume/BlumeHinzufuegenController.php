<?php

use dashboard\Blumenshop\MySqlDatabase;

require 'C:\xampp2\htdocs\dashboard\Blumenshop\MySqlDatabase.php';
require 'C:\xampp2\htdocs\dashboard\Blumenshop\Repositories\BlumenRepository.php';
require 'C:\xampp2\htdocs\dashboard\Blumenshop\Repositories\KriterienRepository.php';

class BlumeHinzufuegenController
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

    public function BlumeInDasSortimentHinzufuegen()
    {
        $kriterien = $this->kriterienrepository->getAllKriterien();
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Views\blume\blumeHinzufuegen.php';
    }
}

$mySQlDatabase = new MySqlDatabase();
$blumenrepository = new BlumenRepository($mySQlDatabase);
$kriterienrepository = new KriterienRepository($mySQlDatabase);
$blumenHinzufuegenController = new BlumeHinzufuegenController($blumenrepository, $kriterienrepository);

if (!empty($_POST['blumename']) && !empty($_POST['kriterienAuswahl']) && !empty($_POST['wert']) && !empty($_POST['preis'])) {
    $blumenHinzufuegenController->getBlumenrepository()->persistiereBlumeInDatenbank();
    $_POST['blumename'] = '';
    $_POST['kriterienAuswahl'] = '';
    $_POST['wert'] = '';
    $_POST['preis'] = '';
}

$blumenHinzufuegenController->BlumeInDasSortimentHinzufuegen();
