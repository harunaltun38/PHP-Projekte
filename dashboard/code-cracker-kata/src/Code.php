<?php

namespace codeCracker;

class Code
{
    /**
     * @var string
     */
    private string $letter;
    /**
     * @var string
     */
    private string $code;

    /**
     * Code constructor.
     * @param string $letter
     * @param string $code
     */
    public function __construct(string $letter, string $code)
    {
        $this->letter = $letter;
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getLetter(): string
    {
        return $this->letter;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }


}