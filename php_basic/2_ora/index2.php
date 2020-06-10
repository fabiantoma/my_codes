<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>

    <?php

    function familyName($name, $year)
    {
        echo "Name:$name,Born:$year<br/>";
    }
    familyName("Sanyi", 1978,);
    familyName("Laci", 1988,);
    familyName("Kriszti", 1999,);


    function setNum($value1, $value2)
    {

        $res = "";
        if (($value1 + $value2) % 2 == 0) {

            $res = "Az összeg páros. <br/>";
        } else {

            $res = "Az összeg páratlan.<br/>";
        }
        return $res;
    }
    echo setNum(3, 4);
    echo "<br";
    echo setNum(5, 5);



    function setHeight($minHeight = 150)
    {
        echo "The height is $minHeight cm </br>";
    }
    setHeight(170);
    setHeight();


    $students = array("Hallgato1" => 23, "Hallgato2" => 32, "Hallgato3" => 42,);
    foreach ($students as $s_Key => $s_Value) {
        echo "Key=" . $s_Key . "Value:" . $s_Value . "<br/>";
    }


    $colors = array("red", "blue", "pink", "yellow");
    $numbers = array(34, 22, 23, 38);

    sort($colors);
    sort($numbers);


    for ($i = 0; $i < count($colors); $i++) {
        echo "$colors[$i]<br/>";
    }

    asort($students);
    foreach ($students as $s_Key => $s_Value) {
        echo "Key= " . $s_Key . "Value: " . $s_Value;
    }
    echo "<br/>";
    function setnm($value1, $value2)
    {
        $res = "";
        if (($value1 + $value2) % 2 == 0) {
            $res = "Az összeg páros<br/>";
        } else {
            $res = "Az összeg páratlan<br/>";
        }
        return $res;
    }
    echo setnm(9, 8);
    echo "<br/>";
    echo setnm(6, 6);

    ?>



</body>

</html>