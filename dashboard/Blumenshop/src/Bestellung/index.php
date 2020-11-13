<?php
namespace MyBlumenshopApp\Bestellung;


require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\vendor\autoload.php';


$bestellung = new Bestellung();


if (empty($_GET['KundenAuswahl'])) {          //noch keine Auswahl getroffen
    $bestellung->getDashboard();
} else {                                        //Auswahl getroffen --> entsprechende Methode wird aufegrufen
    $auswahl = $_GET['KundenAuswahl'];

    $_POST['KundenAuswahl'] = '';              //leere globales Array --> für die nächste Auswahl
    $bestellung->auswahl($auswahl);
}