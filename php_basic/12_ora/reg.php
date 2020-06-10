<?php

include "db.php";
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = sha1($_POST["password"]);
    $_query = "INSERT INTO users(email,name,password,permisson)VALUES('$email','$name','$password','$permisson')";
    mysqli_query($conn, $query);
    header("Location:index.php");
}

?>

<form class="dark" action="reg.php" method="POST">
    <input type="email" id="email" name="email" placeholder="Email">
    <br>
    <input type="fullname" id="fullname" name="fullname" placeholder="fullname">
    <input type="password" id="password" name="password" placeholder="password">
    <input type="password" id="password2" name="password" placeholder="password2">
    <input type="submit" id="submit" name="submit" value="Registration">
    <br>
    <!-- <input type="submit" id="submit" name="submit" value="login"> -->
</form>