<?php
/**
 * @var $blumen array
 */
$blumenarray = $blumen;

/**
 * @var $kriterien array
 */
$kriterienArray = $kriterien;
/**
 * @var $alteBlume string
 */
$vorherigeBlume = $alteBlume;


?>

<form action="/dashboard/Blumenshop/Besitzer/Controller/blume/BlumeUpdatenController.php" method="post">
    <div>
        <label for="nameid">Name der Blume eingeben:</label>
        <input type="text" id="nameidNeu" name="blumenameNeu" value="">
        <input type="hidden" name="alteBlume" value=<?php echo $vorherigeBlume; ?>>
    </div>
    <div>
        <br/>
        <label for="preisid">Geben Sie den Preis ein</label>
        <div>
            <br/>
            Preis: <input type="text" name="preis" id="preisid" value="">
        </div>
    </div>
    <div>
        <br/>
        <label for="kriterienid">Machen Sie eine Auswahl für die Kriterien:
            <br/>
            <select name="kriterienAuswahl[]" id="kriterienid" multiple>
                <?php

                foreach ($kriterienArray as $kriterium) {
                    echo "<option value=\"$kriterium\">$kriterium</option>";
                }
                ?>
            </select>
        </label>
    </div>
    <div>
        <br/>
        <label for="wertid">INFO: Schreiben Sie bei Mehrfachauswahl, die Werte durch ein Komma getrennt. <br/> Beachten
            Sie die Reihenfolge in der Auswahliste </label>

        <div>
            <br/>
            Wert: <input type="text" name="wert" id="wertid" value="">
        </div>
    </div>
    <br/>
    <input type="submit" name="Senden">
</form>
<br>
<a href="/dashboard/Blumenshop/index.php">Zurück ins Hauptmenü</a>

    

