<?php

namespace dashboard\Blumenshop\Besitzer;

use dashboard\Blumenshop\MySqlDatabase;

require 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Besitzer.php';


$besitzer = new Besitzer();


if (empty($_GET['besitzerAuswahl'])) {          //noch keine Auswahl getroffen
    $besitzer->getDashboard();
} else {                                        //Auswahl getroffen --> entsprechende Methode wird aufegrufen
    $auswahl = $_GET['besitzerAuswahl'];

    $_POST['besitzerAuswahl'] = '';              //leere globales Array --> für die nächste Auswahl
    $besitzer->auswahl($auswahl);
}