<?php
$server = 'localhost';
$user = 'root';
$passw = '';
$db = 'reghandler';

$conn = mysqli_connect($server, $user, $passw, $db);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
} else {
    echo "Connected succesfully <br/>";
    mysqli_set_charset($conn, "uft8");
}
