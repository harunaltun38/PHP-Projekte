<?php

use dashboard\Blumenshop\MySqlDatabase;

require 'C:\xampp2\htdocs\dashboard\Blumenshop\MySqlDatabase.php';
require 'C:\xampp2\htdocs\dashboard\Blumenshop\Repositories\BlumenRepository.php';


class BlumeLoeschenController
{
    /**
     * @var BlumenRepository $blumenrepository
     */
    private BlumenRepository $blumenrepository;

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


    public function __construct(BlumenRepository $blumenRepository)
    {
        $this->blumenrepository = $blumenRepository;
    }

    public function blumeLoeschen()
    {
        $blumen = $this->blumenrepository->getAllBlumen();

        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Views\blume\blumeLoeschen.php';
    }
}

$mySqlDatabase = new MySqlDatabase();
$blumenRepository = new BlumenRepository($mySqlDatabase);
$blumeLoeschenController = new BlumeLoeschenController($blumenRepository);

if (!empty ($_POST['loescheBlumeAusDerAuswahl'])) {
    $blumeLoeschenController->getBlumenrepository()->loescheBlumeAusDatenbank();
    $_POST['loescheBlumeAusDerAuswahl'] = '';
}
$blumeLoeschenController->blumeLoeschen();