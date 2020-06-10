<html>

<head>



<body>

    <?php
    //OOP ben a változók mindig privateok//




    class Animal
    {
        //Változók,mezők,fieldek//
        private $family;
        private $food;
        private $name;
        //konstruktor//
        public function __construct($family, $food, $name)
        {

            $this->family = $family;
            $this->food = $food;
            $this->name = $name;
        }



        public function setName($name) //változók,propertyk,//
        {
            $this->name = $name;
        }

        public function getName($name)
        {
            $this->name = $name;
        }
        public function showDetails()
        {
            print "Animal details:Family:{$this->family}||Food:{$this->food}||{Name-$this->name }<br/>";
        }
    }

    $animal1 = new Animal("ragadozó", "hús", "tigris");
    $animal2 = new Animal("növényevő", "fű", "kecske");
    /* $animal3 = new Animal("") */

    $animal1->showDetails();
    $animal2->showDetails();
    $animal1->setName("oroszlán");

    ?>



</body>

</html>