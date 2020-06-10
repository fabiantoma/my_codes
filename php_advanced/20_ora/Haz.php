<?php
class Haz
{
    public  float $alapterulet = 0;
    public  string $cim;
    public  float $magassag;
    public  float $szelesseg;
    public string $szin;
    public  int $emeletek;
    public  int $ablakokSzama;
    public bool $eladoe;

    function setAbalakokSzama(int $db): void
    //A this szintén tudja magárol 
    {
        $this->ablakokSzama = $db;
    }

    function changeColor(string $ujszin): void
    {
        $this->szin = $ujszin;
    }


    function eladosag(bool $eladoe): void
    {
        $this->eladoe = $eladoe;
    }



    function alapteruletBovit(float $mennyire): void
    {
        if ($mennyire > 0) {
            $this->alapterulet = $this->alapterulet + $mennyire;
        }
    }
    function alapteruletCsokken(float $mennyire): void
    {
        if ($mennyire > 0) {
            $this->alapterulet = $this->alapterulet - $mennyire;
        }
    }
    function cimMegvaltoztatasa(string $mire): void
    {
        $this->cim = $mire;
    }


    function info(): string
    { //Ő tudja hogy Ö a haz 1 és haz 2 stb
        return "Cime: " . $this->cim . "; Alapterület: " . $this->alapterulet;
    }
}
