<?php
session_start();


?>



<html>

<head>



</head>

<body>
    <?php
    $_SESSION["color"] = "green";
    $_SESSION["animal"] = "dog";
    $_SESSION["user"] = "Tamas";

    echo "Session was set";


    ?>

    <a href="page1.php">Page1</a>
    <a href="page2.php">Page2</a>
</body>





</html>