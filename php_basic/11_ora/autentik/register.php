<?php
session_start();
include "db.php";

if (isset($_POST["registerBtn"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];


    if ($password == $password2) {
        $password = md5($password);
        $inserQuery = "Insert into users(username,email,password)Values('$username','$email','$password')";
        mysqli_query($conn, $inserQuery);

        $_SESSION["message"] = "You are registered";
        $_SESSION["username"] = $username;
        header("location: login.php");
    } else {
        $_SESSION["message"] = "Two password are not matched";
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



    <form method="POST" action="register.php">

        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="textInput"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" class="textInput"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>
            <tr>
                <td>Password again</td>
                <td><input type="password" name="password2" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="registerBtn" value="Register"></td>

            </tr>


        </table>




    </form>











</body>




</html>