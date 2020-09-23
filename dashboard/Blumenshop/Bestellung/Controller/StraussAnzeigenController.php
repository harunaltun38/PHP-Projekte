<?php

require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\Blumenstrauss.php';
class StraussAnzeigenController

{
    public function blumenStraussAnzeigen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Bestellung\Views\StraussAnzeigen.php';
    }
}

$straussAnzeigenController= new StraussAnzeigenController();


$straussAnzeigenController->blumenStraussAnzeigen();