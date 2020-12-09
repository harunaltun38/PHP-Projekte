<?php

namespace codeCracker;
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'C:\xampp2\htdocs\dashboard\code-cracker-kata\vendor\autoload.php';

class CodeCracker
{
    /** @var array $alphabetAndCodes */
    private $alphabetAndCodes = array('a' => '!', 'b' => ')', 'c' => '"', 'd' => '(', 'e' => '£', 'f' => '*', 'g' => '%',
        'h' => '&', 'i' => '>', 'j' => '<', 'k' => '@', 'l' => 'a', 'm' => 'b', 'n' => 'c', 'o' => 'd', 'p' => 'e',
        'q' => 'f', 'r' => 'g', 's' => 'h', 't' => 'i', 'u' => 'j', 'v' => 'k', 'w' => 'l', 'x' => 'm', 'y' => 'n', 'z' => 'o');

    /* @var  Code[] $codes */
    private $codes;


    private function insertCodes()
    {
        foreach ($this->alphabetAndCodes as $letter => $code) {
            $code = new Code($letter, $code);
            $this->codes[] = $code;
        }

    }

    private function searchForLetter(string $letter)
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