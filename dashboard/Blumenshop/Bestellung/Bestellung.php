<?php


class Bestellung
{

    public function getDashboard()
    {
        include 'Bestellung.html';
    }

    public function auswahl($auswahl)
    {
        switch ($auswahl) {
            case 'Blume-in-Strauss-hinzufuegen':
                $this->blumeinStraussHinzufuegen();
                break;
            case 'Blume-aus-Strauss-entfernen':
                $this->blumeAusStraussEntfernen();
                break;
            case 'Strauss-anzeigen':
                $this->straussAnzeigen();
                break;

        }
    }

    private function straussAnzeigen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Bestellung\Controller\StraussAnzeigenController.php';
    }

    private function blumeinStraussHinzufuegen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Bestellung\Controller\BlumeInStraussHinzufuegenController.php';

    }

    private function blumeAusStraussEntfernen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Bestellung\Controller\BlumeAusStraussEntfernenController.php';
    }


}