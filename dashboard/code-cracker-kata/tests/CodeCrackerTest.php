<?php

declare(strict_types=1);
mb_internal_encoding("UTF-8");
header('Content-type: text/plain; charset=utf-8');

use codeCracker\Code;
use PHPUnit\Framework\TestCase;

class CodeCrackerTest extends TestCase
{
    /** @var array $alphabetAndCodes */
    private $alphabetAndCodes = array('a' => '!', 'b' => ')', 'c' => '"', 'd' => '(', 'e' => '£', 'f' => '*', 'g' => '%',
        'h' => '&', 'i' => '>', 'j' => '<', 'k' => '@', 'l' => 'a', 'm' => 'b', 'n' => 'c', 'o' => 'd', 'p' => 'e',
        'q' => 'f', 'r' => 'g', 's' => 'h', 't' => 'i', 'u' => 'j', 'v' => 'k', 'w' => 'l', 'x' => 'm', 'y' => 'n', 'z' => 'o');

    /* @var  Code[] $codes */
    private $codes;

    public function setUp(): void
    {
        $this->insertCodes();
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

    public function testEncryptWholeText()
    {
        $text = 'HelloWorld';

        self::assertEquals('&£aadldga(', $this->encrypt($text));
    }

    public function testDecryptWholeText()
    {
        $text = '&£aadldga(';
        self::assertEquals('helloworld', $this->decrypt($text));
    }

//Methods for Class CodeCracker. Tests are above

    private function insertCodes()
    {
        foreach ($this->alphabetAndCodes as $letter => $code) {
            $code = new Code($letter, $code);
            $this->codes[] = $code;
        }

    }

    private function searchForLetter(string $letter) // pruefe ob überhaupt verschlüsselt werden kann
    {
        $letterToArray = str_split(strtolower($letter));
        foreach ($this->codes as $code) {

            if (in_array($code->getLetter(), $letterToArray)) {
                return true;
            }
        }
        return false;
    }

    private function searchForCode(string $codeEncrypted)
    {
        $codeEncryptedToArray = str_split($codeEncrypted);
        foreach ($this->codes as $code) {

            if (in_array($code->getCode(), $codeEncryptedToArray)) {
                return true;
            }
        }
        return false;
    }

    private function encrypt(string $letter)
    {
        $result = [];
        if ($this->searchForLetter($letter)) {
            $letterToArray = str_split(strtolower($letter));


            foreach ($letterToArray as $letter) {
                foreach ($this->alphabetAndCodes as $aac => $code) {
                    if ($aac === $letter) {
                        $result[] = $code;
                    }
                }
            }

            return implode($result);
        }
        return 'No code available for this letter';
    }

    private function decrypt(string $decryptCode)
    {
        $result = [];
        if ($this->searchForCode($decryptCode)) {
            $decryptCodeToArray = str_split($decryptCode);  // methode auslagern convert special characeters

            $decryptCodeToArrayUTF8Coded = $this->encodeElementsToUTF_8($decryptCodeToArray);
            foreach ($decryptCodeToArrayUTF8Coded as $code) {
                foreach ($this->alphabetAndCodes as $aac => $singlecode) {
                    if ($singlecode === $code) {
                        $result[] = $aac;
                    }
                }

            }

            return implode($result);
        }
        return 'No letter available for this code';
    }

    private function encodeElementsToUTF_8(array $array)
    {
        foreach ($array as $element) {
            $decryptCodeToArrayUTF8Coded[] = utf8_encode($element);
        }
        return $decryptCodeToArrayUTF8Coded;
    }
}