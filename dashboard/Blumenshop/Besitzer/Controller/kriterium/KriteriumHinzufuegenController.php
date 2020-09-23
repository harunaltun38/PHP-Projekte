<?php

use dashboard\Blumenshop\MySqlDatabase;

require 'C:\xampp2\htdocs\dashboard\Blumenshop\MySqlDatabase.php';
require 'C:\xampp2\htdocs\dashboard\Blumenshop\Repositories\KriterienRepository.php';

class KriteriumHinzufuegenController
{
    /**
     * @var KriterienRepository $kriterienrepository
     */
    private KriterienRepository $kriterienrepository;

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

    public function __construct(KriterienRepository $kriterienRepository)
    {
        $this->kriterienrepository = $kriterienRepository;
    }

    public function kriteriumHinzufuegen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Views\kriterium\kriteriumHinzufuegen.html';
    }
}

$mySqlDataBase = new MySqlDatabase();
$kriterienRepository = new KriterienRepository($mySqlDataBase);
$kriteriumHinzufuegenController = new KriteriumHinzufuegenController($kriterienRepository);

if (!empty($_POST['kriterium'])) {
    $kriteriumHinzufuegenController->getKriterienrepository()->persistiereKriteriumInDatenbank($_POST['kriterium']);
    $_POST['kriterium'] = '';
}
$kriteriumHinzufuegenController->kriteriumHinzufuegen();