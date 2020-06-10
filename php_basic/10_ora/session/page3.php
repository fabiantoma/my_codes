<?php

session_start();

?>


<html>

<head>


</head>

<body>
    <?php
    echo "You are:" . $_SESSION["user"] . "<br>";
    echo "Your color is:" . $_SESSION["color"] . "<br>";
    /* session_unset();  */ // az összes session változót törli//


    /* session_destroy(); */ //törli a sessiont magát//
    print_r($_SESSION);
    ?>

    <a href="page1.php">Page1</a>
</body>


</html>