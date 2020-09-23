<?php


class Blume
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var float
     */
    private float $preis;

    /**
     * Blume constructor.
     * @param string $name
     * @param float $preis
     * @param string $attribut
     * @param string $wert
     */
    public function __construct(string $name, float $preis, string $attribut, string $wert)
    {
        $this->name = $name;
        $this->preis = $preis;
        $this->attribut = $attribut;
        $this->wert = $wert;
    }

    /**
     * @return float
     */
    public function getPreis(): float
    {
        return $this->preis;
    }

    /**
     * @param float $preis
     */
    public function setPreis(float $preis): void
    {
        $this->preis = $preis;
    }

    /**
     * @var string
     */
    private string $attribut;
    /**
     * @var string
     */
    private string $wert;


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



    /**
     * @return string
     */
    public function getAttribut(): string
    {
        return $this->attribut;
    }

    /**
     * @param string $attribut
     */
    public function setAttribut(string $attribut): void
    {
        $this->attribut = $attribut;
    }

    /**
     * @return string
     */
    public function getWert(): string
    {
        return $this->wert;
    }

    /**
     * @param string $wert
     */
    public function setWert(string $wert): void
    {
        $this->wert = $wert;
    }


}