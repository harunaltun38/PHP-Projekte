<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['blumenStrauss'])) {
    $blumenstrauss = unserialize($_SESSION['blumenStrauss']);

}
$SummeArray = [];
foreach ($blumenstrauss->getBlumen() as $blumen) {

    $SummeArray [] = $blumen->getPreis();
}

$gesamtSumme = array_sum($SummeArray);
?>
<table>
    Blumenstrauss mit folgenden Blumen: </br>
    <tr>
        <th>Name</th>
        <th>Preis</th>
        <th>Werte</th>
        <th>Attribute</th>
    </tr>
    <?php
    if ($blumenstrauss instanceof Blumenstrauss) {
        foreach ($blumenstrauss->getBlumen() as $blumen): ?>
            <tr>

                <td><?php echo $blumen->getName() ?></td>
                <td><?php echo $blumen->getPreis() ?></td>
                <td><?php echo $blumen->getWert() ?></td>
                <td><?php echo $blumen->getAttribut() ?></td>

            </tr>
        <?php endforeach;
    } ?>

    <tr>
        <td><?php echo 'Gesamtsumme: ' . $gesamtSumme ?></php></td>
    </tr>
</table>

<a href="/dashboard/Blumenshop/index.php">Zurück ins Hauptmenü</a>