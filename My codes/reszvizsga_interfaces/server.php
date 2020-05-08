<?php
require "start.php";
require "stop.php";
require "move.php";

class Vehicle implements Move
{

    private $brand;
    private $wheels;
    private $color;
    private $plateNumber;
    private $doors;
    private $isLaunched;
    private $isMoving;
    private $type;
    public static $counter =  0;

    public function __construct($brand, $wheels = NULL, $color, $doors = NULL, $plateNumber, $type = NULL)
    {
        $this->wheels = $wheels;
        $this->brand = $brand;
        $this->color = $color;
        $this->plateNumber = $plateNumber;
        $this->doors = $doors;
    }


    public function getType()
    {
        $strType = "TÍPUS: " . $this->type;
        return $strType;
    }

    public function setType($vehicle)
    {

        $this->type = $vehicle;
    }

    public function gurul()
    {
        if ($this->getLaunch()) {
            $this->setIsMoving(true);
        } else {
            echo "A gépjármű nem jár." . "<br>";
        }
    }

    public function getLaunch()
    {
        return $this->isLaunched;
    }

    public function setLaunch(bool $launch)
    {

        $this->isLaunched = $launch;
    }

    public function getIsMoving()
    {
        return $this->isMoving;
    }

    public function setIsMoving(bool $action)
    {
        $this->isMoving = $action;
    }


    public function getNumWheels()
    {

        return $this->wheels;
    }
    public function setNumWheels($numOfWheels): void
    {
        $this->wheels = $numOfWheels;
    }

    public function getNumDoors()
    {

        return $this->doors;
    }

    public function setNumDoors($numOfDoors)
    {
        $this->doors = $numOfDoors;
    }

    public function showInfo()
    {
        echo "<br>" . $this->getType() . "<br>";
        $counter = Vehicle::$counter;
        echo "brand: " . $this->brand . " | " . "wheels: " . $this->wheels . " | " . "color: " . $this->color . " | " . "doors: " . $this->doors . " | " . "Platenumber: " . $this->plateNumber;
        echo "<br>";
        echo "Aktuális példányszám: " . $counter . "<br>";
    }



    public function setColor($colorSet)
    {
        $this->color = $colorSet;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setBrand($brandSet)
    {
        $this->brand = $brandSet;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setPlateNumber($PlateSet)
    {
        $this->plateNumber = $PlateSet;
    }

    public function getPlateNumber()
    {
        return $this->plateNumber;
    }
}


class Auto extends Vehicle implements Start, Stop
{

    private $cabriolet;
    public function __construct($brand, $color, $plateNumber, $cabriolet)
    {
        parent::__construct($brand, $wheels = NULL, $color, $doors = NULL, $plateNumber, $type = NULL);
        Vehicle::$counter++;
        $this->setCabriolet($cabriolet);
        $this->setPlateNumber($plateNumber);
        $this->setBrand($brand);
        $this->setColor($color);
        $this->setNumWheels(4);
        $this->setNumDoors(5);
        $this->setType("AUTO");
    }

    public function getCabriolet()
    {
        return $this->cabriolet;
    }
    public function setCabriolet(bool $fold)
    {
        $this->cabriolet = $fold;
    }
    public function isCabriolet()
    {
        if ($this->getCabriolet()) {
            echo "A tető le lett hajtva." . "<br>";
        } else {
            echo "A tető fel lett engedve." . "<br>";
        }
    }


    public function start()
    {
        if (!$this->getLaunch()) {
            $started = $this->setLaunch(true);
            echo "A jármű beindítva." . "<br>";
        } else {
            echo "A jármű már be van indítva!" . "<br>";
        }
    }
    public function stop()
    {
        if ($this->getLaunch()) {
            $this->setLaunch(false);
            echo "A jármű leállítva." . "<br>";
        } else {
            echo "A gépjármű már le van állítva." . "<br>";
        }
    }
}

class Motor extends Vehicle implements Start, Stop
{

    public function __construct($brand, $color, $plateNumber)
    {
        parent::__construct($brand, $wheels = NULL, $color, $doors = NULL, $plateNumber, $type = NULL);
        Vehicle::$counter++;
        $this->setPlateNumber($plateNumber);
        $this->setBrand($brand);
        $this->setColor($color);
        $this->setNumWheels(2);
        $this->setNumDoors(0);
        $this->setType("MOTOR");
    }


    public function start()
    {
        if (!$this->getLaunch()) {
            $started = $this->setLaunch(true);
            echo "A jármű beindítva." . "<br>";
        } else {
            echo "A jármű már be lett indítva!" . "<br>";
        }
    }
    public function stop()
    {
        if ($this->getLaunch()) {
            $this->setLaunch(false);
            echo "A jármű leállítva." . "<br>";
        } else {
            echo "A jármű már le lett állítva." . "<br>";
        }
    }
}
