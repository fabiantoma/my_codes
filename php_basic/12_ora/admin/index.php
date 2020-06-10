<?php


include "../db.php";
if (!isset($_COOKIE["user"]) || empty($_COOKIE["user"])) {

    die;
}
$id = $_COOKIE["user"];
$query = "SELECT * From users Where id='$id'"; //titkositjuk a jelszavat//
$data = mysqli_fetch_assoc(mysqli_query($conn, $query));

if ($data["permisson"] != "ADMIN") {
    header("Location:../index.php");
    die;
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
print "<table>";
print "<tr>";
print "<td>ID</td><td>E-mail</td><td>nev</td><td>permisson</td>";
print "<tr>";
while ($row = mysqli_fetch_array($result)) {


    $id = $row["id"];
    $email =  $row["email"];
    $name =  $row["name"];
    $permisson =  $row["permisson"];
    print "<tr>";
    print "<td>$id</td><td>$email</td><td>$name</td><td>$permisson</td>";
    print "<tr>";
}
print "</table>";
