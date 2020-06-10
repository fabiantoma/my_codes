<!DOCTYPE html>
<html lang="en">
<head>
<?php



class Mycars {
    public $name;
    public $color;
    public $price;
    public $topspeed;

    private $consumption;

    public function getConsumption(){//private nem látható kivűlről etért kell neki "get "és "set "function a class-ba//
        return $this->consumption;
    }
    public function setConsumption($consumption){//private nem látható kivűlről etért kell neki "get "és "set "function a class-ba//
         $this->consumption=$consumption;
    }

 public function __construct($name,$color,$price,$topspeed){

    $this->name=$name;
    $this->color=$color;
    $this->price=$price;
    $this->topspeed=$topspeed;
 }

 

 public function showDetails(){
     print "Name :{$this->name} | Color:{$this->color} | Price:{$this->price} <br/>";
 }
 function writeoutTopspeed(){
    print "My topspeed is {$this->topspeed} km/h <br/>";
}
}
 $car1=new Mycars("BMW","black",20000,243,);
 $car2=new Mycars("AUDI","blue",30000,250,);

 $car1->showDetails();
 $car2->showDetails();



$car1->writeoutTopspeed();
$car2->writeoutTopspeed();
$car1->setConsumption(14);//megadom az értéket//

echo $car1->getConsumption();//lekérem az értéket//




?>
</head>
<body>
    
</body>
</html>