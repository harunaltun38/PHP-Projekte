<?php

require 'Blume.php';

class Blumenstrauss
{
    /**
     * @var Blume[] $blumen
     */
    private $blumen = [];

    private string $name;

    private float $gesamtPreis;

    /**
     * @return Blume[]
     */
    public function getBlumen(): array
    {
        return $this->blumen;
    }

    /**
     * @param Blume[] $blumen
     */
    public function setBlumen(array $blumen): void
    {
        $this->blumen = $blumen;
    }

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
     * @return float
     */
    public function getGesamtPreis(): float
    {
        return $this->gesamtPreis;
    }

    /**
     * @param float $gesamtPreis
     */
    public function setGesamtPreis(float $gesamtPreis): void
    {
        $this->gesamtPreis = $gesamtPreis;
    }


}

?>
