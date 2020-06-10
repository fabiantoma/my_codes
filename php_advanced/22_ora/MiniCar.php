<?php
include "ICar.php";
include "IVehicle.php";

class MiniCar implements ICar, IVehicle
{
    private $model;
    private $HasWheels;


    public function setModel($name)
    {

        $this->model = $name;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function setHasWheels($bool)
    {
        $this->hasWheels = $bool;
    }
    public function getHasWheels()
    {
        return ($this->hasWheels) ? "has wheels" : "no wheels";
    }
}

$mcar1 = new MiniCar();
$mcar1->setModel("Mini Cooper");
echo $mcar1->getModel();
$mcar1->setHasWheels(true);
echo "<br/>";
echo $mcar1->getHasWheels();
