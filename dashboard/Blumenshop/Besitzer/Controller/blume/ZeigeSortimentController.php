<?php


use dashboard\Blumenshop\MySqlDatabase;

require 'C:\xampp2\htdocs\dashboard\Blumenshop\MySqlDatabase.php';
require 'C:\xampp2\htdocs\dashboard\Blumenshop\Repositories\BlumenRepository.php';

class ZeigeSortimentController
{
    /**
     * @var BlumenRepository $blumenrepository
     */
    private BlumenRepository $blumenrepository;


    public function __construct(BlumenRepository $blumenRepository)
    {
        $this->blumenrepository = $blumenRepository;
    }

    public function zeigeSortiment()
    {
        $blumen = $this->blumenrepository->getAllBlumen();
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Views\blume\zeigeSortiment.php';

    }
}
$mySQLDatabase = new MySqlDatabase();
$blumenRepository = new BlumenRepository($mySQLDatabase);
$zeigeSortimentController = new ZeigeSortimentController($blumenRepository);

$zeigeSortimentController->zeigeSortiment();