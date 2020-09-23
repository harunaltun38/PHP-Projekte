<?php

namespace dashboard\Blumenshop\Besitzer;


class Besitzer
{

    public function getDashboard()
    {
        include 'Besitzer.html';
    }

    public function auswahl($auswahl)
    {
        switch ($auswahl) {
            case 'Zeige-das-Sortiment':
                $this->zeigeSortiment();
                break;
            case 'Kriterium-hinzufuegen':
                $this->kriteriumHinzufuegen();
                break;
            case 'Blume-hinzufuegen':
                $this->BlumeInDasSortimentHinzufuegen();
                break;
            case 'Blume-loeschen':
                $this->Blumeloeschen();
                break;

        }
    }

    private function zeigeSortiment()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Controller\blume\ZeigeSortimentController.php';
    }

    private function kriteriumHinzufuegen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Controller\kriterium\KriteriumHinzufuegenController.php';

    }

    private function BlumeInDasSortimentHinzufuegen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Controller\blume\BlumeHinzufuegenController.php';
    }

    private function blumeLoeschen()
    {
        include 'C:\xampp2\htdocs\dashboard\Blumenshop\Besitzer\Controller\blume\BlumeLoeschenController.php';
    }

}

