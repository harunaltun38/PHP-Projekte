<?php

namespace MyBlumenshopApp\Besitzer\Controller\blume;

require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\vendor\autoload.php';


use MyBlumenshopApp\MySqlDatabase;
use MyBlumenshopApp\Repositories\BlumenRepository;


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
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\src\Besitzer\Views\blume\zeigeSortiment.php';

    }
}
$mySQLDatabase = new MySqlDatabase();
$blumenRepository = new BlumenRepository($mySQLDatabase);
$zeigeSortimentController = new ZeigeSortimentController($blumenRepository);

$zeigeSortimentController->zeigeSortiment();