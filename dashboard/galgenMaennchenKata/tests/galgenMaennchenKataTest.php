<?php


use galgenmaennchen\Galgenmaennchen;
use PHPUnit\Framework\TestCase;

class galgenMaennchenKataTest extends TestCase
{

    public function testRateBuchstabemitErfolg()
    {
        $galgenmaennchen = new Galgenmaennchen('Hallo');
        $galgenmaennchen->RateBuchstabe('l');
        $galgenmaennchen->RateBuchstabe('H');
        $galgenmaennchen->RateBuchstabe('o');
        $galgenmaennchen->RateBuchstabe('a');

        self::assertEquals('Hallo', implode($galgenmaennchen->getResult()));
    }

    public function testRateBuchstabemitFehlschlag()
    {
        $galgenmaennchen = new Galgenmaennchen('abcdef');
        $galgenmaennchen->RateBuchstabe('l');
        $galgenmaennchen->RateBuchstabe('H');
        $galgenmaennchen->RateBuchstabe('o');
        $galgenmaennchen->RateBuchstabe('a');

        self::assertNotEquals('Hallo', implode($galgenmaennchen->getResult()));
    }


}