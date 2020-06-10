<?php


session_start();

?>


<html>

<head>

</head>

<body>
    <?php
    echo "Your color is:" . $_SESSION["color"] . "<br>";
    echo "Your animal is:" . $_SESSION["animal"] . "<br>";




    ?>


</body>

</html>