<?php
require_once "Haz.php";
require_once "ember.php";

$haz1 = new Haz();
$haz1->cimMegvaltoztatasa("Szeged");
$haz2 = new Haz();
$haz2->cimMegvaltoztatasa("Kiskundorozsma");
$haz3 = new Haz();
$haz3->cimMegvaltoztatasa("Mako");
$haz4 = new Haz();
$haz4->cimMegvaltoztatasa("Mako");


$haz1->alapteruletBovit(40);
$haz2->alapteruletBovit(12);
$haz3->alapteruletBovit(15);
$haz3->alapteruletBovit(10);
$haz4->alapteruletBovit(10);
$haz1->alapteruletCsokken(5);

echo $haz1->info() . "<br>";
echo $haz2->info() . "<br>";
echo $haz3->info() . "<br>";
echo $haz4->info() . "<br>";

/* $emberek[] = new Ember();
$emberek[0]->changeName("joe");
$emberek[0]->changeGender(0);
$emberek[0]->adoszamBeallit("1234567890");
$emberek[] = new Ember();
$emberek[0]->changeName("emese");
$emberek[0]->changeGender(1);
$emberek[0]->adoszamBeallit("23456710");

$emberek[1]->neme = 1234123;

$emberek[] = new Ember();
$emberek[] = new Ember();
$emberek[] = new Ember();

$emberek[0]->oregedett1Evet();


foreach ($emberek as $ember) {
    echo $ember->info() . "<br>";
} */
$ember = new Ember();
$ember->ChangeName("Arnold");
$ember->adoszamBeallit("123456");
$ember->changeGender(0);
$ember->oregedett1Evet();

echo $ember->info();
