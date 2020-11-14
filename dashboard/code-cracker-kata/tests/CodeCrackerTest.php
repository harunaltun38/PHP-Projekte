<?php
declare(strict_types=1);

use codeCracker\Code;
use PHPUnit\Framework\TestCase;

class CodeCrackerTest extends TestCase
{
    /* @var  Code[] $alphabet */
    private $alphabet;

    public function setUp(): void
    {
        $code = new Code('a', '!');
        $this->alphabet[] = $code;
    }

    public function testSearchNotFound()
    {
        $letter = '#';

        self::assertEquals(false, $this->search($letter));
    }

    public function testSearchFound()
    {
        self::assertEquals(true, $this->search('a'));

    }

    private function search(string $letter)
    {
        foreach ($this->alphabet as $code) {

            if ($code->getLetter() === $letter) {
                return true;
            }
        }
        return false;
    }
//    private function search(string $buchstabe)
//    {
//        foreach ($this->alphabet as $key => $code) {
//
//            if ($key === $buchstabe) {
//                return $code;
//            }
//        }
//    }
}