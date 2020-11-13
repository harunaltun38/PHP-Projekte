<?php
namespace MyBlumenshopApp\Bestellung\Controller;

require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\vendor\autoload.php';


use MyBlumenshopApp\Entities\Blumenstrauss;

if (!isset($_SESSION)) {
    session_start();
}


class BlumeAusStraussEntfernenController
{
    public function blumeAusStraussEntfernen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\src\Bestellung\Views\BlumenAusStraussEntfernen.php';
    }

}

$blumeAusStraussEntfernenController = new BlumeAusStraussEntfernenController();


if (!empty($_POST['loescheBlumeAusDemStrauss'])) {

    $deleteBlume = $_POST['loescheBlumeAusDemStrauss'];

    if (isset($_SESSION['blumenStrauss'])) {
        $blumenstrauss = unserialize($_SESSION['blumenStrauss']);
    }
    if ($blumenstrauss instanceof Blumenstrauss) {

        $blumenArray = $blumenstrauss->getBlumen();    //copy array

        foreach ($blumenArray as $index => $blume) {
            if ($blume->getName() === $deleteBlume) {
                $displayName = $blume->getName();
                unset($blumenArray[$index]);                //kicke Objekt aus array
                $reIndexBlumenArray = array_values($blumenArray);    //reindexen
                break; //Für den Fall wenn gleichnamige Blumen im Blumenstrauss sich befinden, soll nur das ausgewählte entfernt werden und nivht alle mit dem gleichen Namen
            }
        }

        $blumenstrauss->setBlumen($reIndexBlumenArray);
    }
    $_SESSION['blumenStrauss'] = serialize($blumenstrauss);
    echo 'Blume: ' . $displayName . ' erfolgreich aus dem Strauss entfernt';
    $_POST['loescheBlumeAusDemStrauss'] = '';
}

$blumeAusStraussEntfernenController->blumeAusStraussEntfernen();
