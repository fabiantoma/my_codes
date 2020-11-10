<?php

//Létrehoztam egy Human osztályt ez az alapja a többi Soldier es a Worker osztálynak,
class Human
{

    protected $power = "100";
    protected $health = "100";
    public function move()
    {
    }
}
class Soldier extends Human //tartalmazza mindazon tulajdonságokat is mint a Human osztály//
{

    private $injury = "100";
    private $attackDamage = "100";
    public function attact()
    {
    }
}

class Worker extends Human  //tartalmazza mindazon tulajdonságokat is mint a Human osztály,de még egy építő metódussal is rendelkezik//
{

    public function build()
    {
    }
}


//Absztrakt osztály-Létrehozhatok egy Vehicle osztályt absztraktként ezt osztályt soha nem is fogom külön példányosítani,mert az alapja lesz sok más osztályomnak//
abstract class AbstractVehicle implements CarInterface
{

    protected $HorsePower = "100";
    protected $speed = "100";
}
class Car extends AbstractVehicle //Ennek az osztálynak van sebessége,tud mozogni de még 5 ajtóval és 5 üléssel is rendelkezeik//
{
    public $seats = "5";
    public $door = "5";
    public function move()
    {
    }
}
class Truck extends AbstractVehicle //Ez az osztály még rendelekezik egy szállítás metódussal is//
{
    public $seats = "3";
    public $door = "2";
    public function carry()
    {
    }
    public function move()
    {
    }
    use CarVoice;
}
//Létrehozok egy interfészt amit implementálok az absztrak osztályomhoz,figyelni kell hogy a benne lévő metódusokat is bele kell írni a létrehozott osztályokba.
interface CarInterface
{

    public function move();
}



//A trait nem világos nekem annyira de megpróbálok valami hasonlót alakítani//

trait CarVoice //létrehoztam//
{
    public function brumm()
    {
        echo "brummmmaaaaa";
    }
}
class Bus extends AbstractVehicle //ebben az osztályban meg használom a trait-et//
{
    public $seats = "40";
    public $door = "2";
    public function PeopleCarry()
    {
    }
    public function move()
    {
    }
    use CarVoice;
}
$Ikarus = new Bus;
$Ikarus->brumm();
