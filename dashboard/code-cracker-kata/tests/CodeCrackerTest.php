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

    public function testSearchForLetterNotFound()
    {
        self::assertEquals(false, $this->searchForLetter('#'));
    }

    public function testSearchForLetterFound()
    {
        self::assertEquals(true, $this->searchForLetter('a'));

    }

    public function testSearchForCodeFound()
    {

        self::assertEquals(true, $this->searchForCode('!'));
    }

    public function testSearchForCodeNotFound()
    {
        self::assertEquals(false, $this->searchForCode('_'));
    }

    public function testEncryptSuccess()
    {

        self::assertEquals('!', $this->encrypt('a'));

    }

    public function testEncryptFail()
    {
        self::assertNotEquals('?', $this->encrypt('a'));
        self::assertEquals('No code available for this letter', $this->encrypt('+'));
    }

    public function testDecryptSuccess()
    {
        self::assertEquals('a', $this->decrypt('!'));
    }

    public function testDecryptFail()
    {
        self::assertNotEquals('.', $this->decrypt('!'));
        self::assertEquals('No letter available for this code', $this->decrypt(':'));
    }

    private function searchForLetter(string $letter)
    {
        foreach ($this->alphabet as $code) {

            if ($code->getLetter() === $letter) {
                return true;
            }
        }
        return false;
    }

    private function searchForCode(string $codeEncrypted)
    {
        foreach ($this->alphabet as $code) {

            if ($code->getCode() === $codeEncrypted) {
                return true;
            }
        }
        return false;
    }

    private function encrypt(string $letter)
    {
        if ($this->searchForLetter($letter)) {

            foreach ($this->alphabet as $code) {
                if ($code->getLetter() === $letter) {
                    return $code->getCode();
                }
            }
        }
        return 'No code available for this letter';
    }

    private function decrypt(string $decryptCode)
    {
        if ($this->searchForCode($decryptCode)) {
            foreach ($this->alphabet as $code) {
                if ($code->getCode() === $decryptCode) {
                    return $code->getLetter();
                }
            }
        }
        return 'No letter available for this code';
    }


}