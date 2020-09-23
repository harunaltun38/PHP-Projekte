<?php
/**
 * @var $blumen array
 */
$blumenArray = $blumen; ?>

<form action="/dashboard/Blumenshop/Besitzer/Controller/blume/BlumeLoeschenController.php" method="post">
    <label for="loescheBlumeAusDerAuswahlid">Aus der Auswahl die Blume löschen</label>
    <select name="loescheBlumeAusDerAuswahl" id="loescheBlumeAusDerAuswahlid">


        <?php
        $blumennamen = [];
        foreach ($blumenArray as $blumen => $blumenattribute) {
            foreach ($blumenattribute as $key => $value) {
                if ($key === 'name')
                    $blumennamen [] = $blumenattribute[$key];
            }
        }
        foreach ($blumennamen as $blumenname) {
            echo "<option value=\"$blumenname\">$blumenname</option>";
        }
        ?>
    </select>
    <input type="submit" name="Senden">
</form>
<br>
<a href="/dashboard/Blumenshop/index.php">Zurück ins Hauptmenü</a>
