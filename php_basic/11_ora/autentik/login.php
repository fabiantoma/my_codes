<?php
session_start();
include "db.php";
if (isset($_POST["loginBtn"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($password);
    $selectQuery = "Select*from users where username='$username' and password='$password'";
    $result = mysqli_query($conn, $selectQuery);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION["message"] = "You are logged in";
        $_SESSION["username"] = $username;
        header("location:../ajax_example/gyak.php");
    }
}
?>


<html>

<head>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <div class="header">
        <h1>User registration,login,logout</h1>



    </div>

    <?php

    if (isset($_SESSION["message"])) {
        echo "<div id='sessionMessage'>" . $_SESSION["message"] . "</div>"; //kiírja a üzenetet//
    }
    ?>
    <form method="POST" action="login.php">

        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="textInput"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="loginBtn" value="Login"></td>
                <a href="register.php">Registration</a>
            </tr>


        </table>




    </form>











</body>




</html>