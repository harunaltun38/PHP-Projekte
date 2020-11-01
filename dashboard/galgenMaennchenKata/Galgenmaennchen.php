<?php


class Galgenmaennchen
{

    private $wort = [];

    private $result = [];


    public function __construct(string $wort)
    {
        $this->wort = str_split($wort);

        $this->result = array_fill(0, count($this->wort), '-');
    }

    public function RateBuchstabe(string $buchstabe)
    {
        $this->setzeBuchstabeInErgebnis($buchstabe);

        $this->zeigeZwischenstand();
        if ($this->pruefeSieg($this->result) == true) {
            $this->gratulation();

        }

    }


    private function pruefeSieg(array $result): bool
    {
        return $this->wort == $result;
    }

    private function WortZusammenSetzen(array $positionDerZeichen): array
    {
        ksort($positionDerZeichen);
        return $positionDerZeichen;
    }

    private function gratulation()
    {
        echo 'Sie haben gewonnen' . 'das Wort lautet: ' . json_encode($this->wort);
    }

    /**
     * @param string $buchstabe
     */
    private function setzeBuchstabeInErgebnis(string $buchstabe): void
    {
        //  for ($i = 0; $i < count($this->wort); $i++) {
        //      if ($this->wort[$i] == $buchstabe) {
        //          $this->result[$i] = $buchstabe;  //key: position : value: Zeichen
        //     }
        // }
        foreach ($this->wort as $key => $value) {

            if ($value == $buchstabe) {
                $this->result[$key] = $value;
            }
        }
    }

    private function zeigeZwischenstand(): void
    {
        echo implode('', $this->result) . "<br>";

    }
}