<html>

<head>



<body>

    <?php
    //OOP ben a változók mindig privateok//




    class Person
    {

        //függvények//
        public static function writePerson()
        {
            echo "I am a person";
        }
    }



    class Employee
    {

        public static function writeEmployee()
        {

            echo "I am employee";
        }
    }

    class Developer extends Employee
    {

        public  static $hello = "hello";

        public static function writeDeveloper()
        {

            //self :: vagy Class Name::segítségével tudok hivatkozni satikus változóra//
            echo self::$hello;
            echo "<br/>";
            echo Person::writePerson();
            echo "<br/>";
            echo Employee::writeEmployee();
            echo "<br/>";
            echo "I am Developer";
        }
    }

    echo Developer::writeDeveloper();
    echo "<br/>";
    echo Developer::$hello;

    $dev1 = new Developer();
    echo "<br/>";
    $dev1->writeDeveloper(); // ez a rész csak PHP fut//

    //a static arra való hogy egy classból egy függvénnyel tudjunk hivatkozni a benne levő változókra példányosítás nélkül,//


    ?>



</body>

</html>