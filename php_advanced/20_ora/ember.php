<?php
class Ember
{
    //mindig minden valtozó kis betüvel kezdődik szóköz helyett nagybetű és kisbetű

    private  string $neve;
    private  int $kora = 0;
    private int $adoszam;

    //0 férfi,1 a nő//
    private int $neme;

    function info(): string
    {
        return "[Neve: " . $this->neve . " (" . ($this->neme == 0 ? "ferfi" : "nő") . "),Kora: " . $this->kora . ", Adoszam:" . $this->adoszam . "]";
    }
    function changeGender(int $gender): void
    {
        $this->neme = $gender;
    }
    function changeName(string $neve): void
    {
        $this->neve = $neve;
    }
    function oregedett1Evet(): void
    {
        $this->kora = $this->kora + 1;
    }

    function adoszamBeallit(string $adoszam): void
    { //ha van adoszam akkor az ha nincs akkor adunk neki
        $this->adoszam = $this->adoszam ?? $adoszam;
    }
}
/* $ember=new Ember();
$ember->ChangeName("Arnold");
$ember->adoszamBeallit("123456");
$ember->changeGender(); */
