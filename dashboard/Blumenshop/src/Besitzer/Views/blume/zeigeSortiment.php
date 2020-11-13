<?php
namespace MyBlumenshopApp\Besitzer\Views\blume;
/**
 * @var $blumen array
 */
$blumenArray = $blumen;
?>

<form action="/dashboard/Blumenshop/src/Besitzer/Controller/blume/BlumeUpdatenController.php" method="post">
    <table>
        <tr>
            <th>Nr.</th>
            <th>Name</th>
            <th>Preis</th>
            <th>Werte</th>
            <th>Attribute</th>
        </tr>
        <?php
        foreach ($blumenArray as $blumen => $blumenattribute): ?>
            <tr>
                <?php foreach ($blumenattribute as $key => $value): ?>
                    <td><?php echo $value ?></td>
                <?php endforeach; ?>

                <td>
                    &nbsp &nbsp Update Blume: <input type="submit" name="UpdateBlume"
                                                     value="<?php echo $blumenattribute['name'] ?>">
                </td>

            </tr>
        <?php endforeach; ?>
    </table>

</form>
<br>
<a href="/dashboard/Blumenshop/src/index.php">Zurück ins Hauptmenü</a>