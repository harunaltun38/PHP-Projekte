<?php
namespace MyBlumenshopApp\Bestellung\Controller;

require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\vendor\autoload.php';


class StraussAnzeigenController

{
    public function blumenStraussAnzeigen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\src\Bestellung\Views\StraussAnzeigen.php';
    }
}

$straussAnzeigenController= new StraussAnzeigenController();


$straussAnzeigenController->blumenStraussAnzeigen();