<?php
namespace MyBlumenshopApp\Bestellung\Views;

use Blumenstrauss;

if(!isset($_SESSION))
{
    session_start();
}

if (isset($_SESSION['blumenStrauss'])) {
    $blumenstrauss = unserialize($_SESSION['blumenStrauss']);

}

$blumennamen = [];


if ($blumenstrauss instanceof Blumenstrauss) {

    foreach ($blumenstrauss->getBlumen() as $blumen) {
        $blumennamen [] = $blumen->getName();
    }
}


?>

<form action="/dashboard/Blumenshop/src/Bestellung/Controller/BlumeAusStraussEntfernenController.php" method="post">
    <label for="loescheBlumeAusDerAuswahlVomStraussid">Aus dem Strauss folgende Blume löschen</label>
    <select name="loescheBlumeAusDemStrauss" id="loescheBlumeAusDerAuswahlVomStraussid">

        <?php

        foreach ($blumennamen as $blumenname) {
            echo "<option value=\"$blumenname\">$blumenname</option>";
        }
        ?>
    </select>
    <input type="submit" name="Senden">
</form>
<br>
<a href="/dashboard/Blumenshop/src/index.php">Zurück ins Hauptmenü</a>
