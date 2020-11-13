<?php
namespace MyBlumenshopApp\Besitzer;

require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\vendor\autoload.php';


/**
 * @var Besitzer $besitzer
 */
$besitzer = new Besitzer();


if (empty($_GET['besitzerAuswahl'])) {          //noch keine Auswahl getroffen
    $besitzer->getDashboard();
} else {                                        //Auswahl getroffen --> entsprechende Methode wird aufegrufen
    $auswahl = $_GET['besitzerAuswahl'];

    $_POST['besitzerAuswahl'] = '';              //leere globales Array --> für die nächste Auswahl
    $besitzer->auswahl($auswahl);
}