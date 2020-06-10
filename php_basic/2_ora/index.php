<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>

    <?php

    //string kezelő függvények//

    echo strlen("Hello World");

    echo "<br>";
    echo str_word_count("This hause is red");
    echo "<br>";
    echo strrev("Hello World");
    echo "<br>";
    echo str_replace("World", "Tamas", "Hello World"); //MIt,mire,amire szeretném a cserét//

    define("NAME", "Tamas", true);
    echo "<br>";
    echo "NaMe";

    function writeConst()
    {
        echo "<br>";
        echo "NaMe";
    }
    writeConst();


    echo "<br>";

    $hour = date("H");
    echo "<br>";
    if ($hour < "10") {
        echo ("jo reggelt Vietnám");
    } else if ($hour < "20") {
        echo ("jo napot Vietnám");
    } else {
        echo ("jo estét Vietnám");
    }
    echo "<br>";


    $colors = array("red", "blue", "pink", "yellow");
    foreach ($colors as $color) {
        echo "<br>color: $color";
    }
    echo "<br>";
    for ($i = 0; $i < count($colors); $i++) {
        print $colors[$i];
    }

    echo "<br>";


    ?>

</body>

</html>