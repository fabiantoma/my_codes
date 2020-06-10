<html>

<head>



<body>

    <?php
    //OOP ben a változók mindig privateok//




    trait Cat
    {


        public function speakCat()
        {
            echo "I am a cat.Moiau!";
        }
    }

    trait Dog
    {


        public function speakDog()
        {
            echo "I am a dog.Vau!";
        }
    }

    class Animal
    {

        use Cat, Dog;
        const DUCK = "KACSA";

        public function __contruct()
        {
        }

        public function speakDuck()
        {
            echo "I am a Duck alias" . self::DUCK . ".Quak!";
        }
    }

    $animal = new Animal();
    $animal->speakCat();
    echo "<br/>";
    $animal->speakDog();
    echo "<br/>";
    echo Animal::DUCK;
    echo "<br/>";
    echo $animal->speakDuck();
    // traitek segítségével lehet használni a többszörös öröklődését//
    ?>



</body>

</html>