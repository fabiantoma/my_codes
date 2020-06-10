<html>

<head>

</head>

<body>

    <?php
    //OOP ben a változók mindig privateok//
    class MyCar
    {

        public $name;
        public $color;
        public $price;

        public function __construct($name, $color, $price)
        {

            $this->name = $name;
            $this->color = $color;
            $this->price = $price;
        }
        public function showDetails()
        {
            print "Car details-Name:{$this->name}||Color:{$this->color}||Price {$this->price}<br/>";
        }
    }
    $car1 = new MyCar("BMW", "black", "30000");
    $car2 = new MyCar("AUDI", "white", "40000");

    $car1->showDetails();

    ?>








</body>

</html>