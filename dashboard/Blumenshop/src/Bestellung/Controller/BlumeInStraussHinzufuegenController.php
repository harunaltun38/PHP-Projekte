<?php
namespace MyBlumenshopApp\Bestellung\Controller;

require_once 'C:\xampp2\htdocs\dashboard\Blumenshop\vendor\autoload.php';


use MyBlumenshopApp\Entities\Blume;
use MyBlumenshopApp\MySqlDatabase;
use MyBlumenshopApp\Repositories\BlumenRepository;
use MyBlumenshopApp\Entities\Blumenstrauss;


session_start();

class BlumeInStraussHinzufuegenController
{
    /**
     * @var BlumenRepository $blumenrepository
     */
    private BlumenRepository $blumenrepository;

    /**
     * @var Blumenstrauss $blumenstrauss
     */
    private Blumenstrauss $blumenstrauss;


    public function __construct()
    {
        $mysqlDatabase = new MySqlDatabase();
        $this->blumenrepository = new BlumenRepository($mysqlDatabase);
        $this->blumenstrauss = new Blumenstrauss();

    }

    /**
     * @return Blumenstrauss
     */
    public function getBlumenstrauss(): Blumenstrauss
    {
        return $this->blumenstrauss;
    }

    /**
     * @param Blumenstrauss $blumenstrauss
     */
    public function setBlumenstrauss(Blumenstrauss $blumenstrauss): void
    {
        $this->blumenstrauss = $blumenstrauss;
    }


    /**
     * @return BlumenRepository
     */
    public function getBlumenrepository(): BlumenRepository
    {
        return $this->blumenrepository;
    }

    public function blumeInStraussHinzufuegen()
    {
        $blumen = $this->blumenrepository->getAllBlumen();
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\src\Bestellung\Views\BlumenInStraussHinzufuegen.php';
    }
}


$blumeInStraussHinzufuegenController = new BlumeInStraussHinzufuegenController();

if (!empty($_POST['blumeinStrausshinzufuegen'])) {
    $blumenarray = $blumeInStraussHinzufuegenController->getBlumenrepository()->getAusgewaehlteBlume($_POST['blumeinStrausshinzufuegen']);

    foreach ($blumenarray as $blume) {
        $neueBlume = new Blume($blume['name'], $blume['preis'], $blume['attribut'], $blume['wert']);
    }

    //Todo: pruefe ob blumenstrauss existiert

    if (isset($_SESSION['blumenStrauss'])) {                   //Es existieren bereits Blumen im Blumenstrauss

        $blumenstraussVorhanden = unserialize($_SESSION['blumenStrauss']);


        if ($blumenstraussVorhanden instanceof Blumenstrauss) {
            $positionFuerNeueBlume = count($blumenstraussVorhanden->getBlumen());
            $blumen = $blumenstraussVorhanden->getBlumen();

            $blumen[$positionFuerNeueBlume] = $neueBlume;
            $blumenstraussVorhanden->setBlumen($blumen);
        }
        $_SESSION['blumenStrauss'] = serialize($blumenstraussVorhanden);
    } else {
        $blumenstrauss = new Blumenstrauss();
        $blumenstrauss->setBlumen([$neueBlume]);


        $_SESSION['blumenStrauss'] = serialize($blumenstrauss);
    }

    echo 'Blume: ' . $neueBlume->getName() . ' erfolgreich in den Strauss hinzugefuegt';

    $_POST['blumeinStrausshinzufuegen'] = '';

}

$blumeInStraussHinzufuegenController->blumeInStraussHinzufuegen();
