<?php


session_start();




?>

<html>

<head>


</head>



<body>
    <?php
    echo "You are :" . $_SESSION["user"] . "<br>";
    $_SESSION["color"] = "blue";



    ?>

    <a href="page3.php">page3</a>
</body>






</html>