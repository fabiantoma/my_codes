<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>
    <?php
    $cars = array(

        array("Volvo", 23, 12000), //létrehozunk egy tömböt autó nevekkel,db szám és árral//
        array("Ford", 12, 8000),
        array("BMW", 63, 16000),
        array("Audi", 18, 13000),
        array("Lada", 11, 500)
    );


    echo "Name: " . $cars[1][0] . " |Stock:" . $cars[1][1] . "|Sold:" . $cars[1][2] . "<br/>"; //kiiratom a tömbindexek alapján a megkért tartalmat//


    for ($i = 0; $i < 5; $i++) { //végigjárom a tömböt for ciklussal és kiiratom a az összes tartalmat//
        for ($j = 0; $j < 3; $j++) {
            echo $cars[$i][$j] . " | ";
        }
        echo "<br/>";
    }


    //Json PHP-ban,létrehozása itt látható//
    $people = array(

        0 => array("name" => "Ellie", "password" => "trial89"),

        1 => array("name" => "Bob", "password" => "ford123"),

        2 => array("name" => "Admin", "password" => "admin"),
    );

    echo "<br/>";

    for ($i = 0; $i < count($people); $i++) { //és itt pedig bejárjuk for és foreachel.//
        foreach ($people[$i] as $value) {
            echo $value . " |  ";
        }
        echo "<br/>";
    }






    ?>
</body>

</html>