<?php
namespace galgenmaennchen;
error_reporting(E_ALL);
ini_set('display_errors', 1);


class GalgenmaennchenController
{
    public function spiele()
    {
        $StarteSpiel = new Galgenmaennchen('Hallo');

        $StarteSpiel->RateBuchstabe('l');
        $StarteSpiel->RateBuchstabe('H');
        $StarteSpiel->RateBuchstabe('o');
        $StarteSpiel->RateBuchstabe('a');

    }

}

$start = new GalgenmaennchenController();
$start->spiele();
?>