<?php
require_once "common.php";

$conn = @new mysqli($host, $username, $password); //kukaccal elrejtem a hiba kiírását//
$conn->select_db($dbname);
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_errno);
}


$sql = "INSERT INTO users (username,password,permission) VALUES (pistike,bicigli,0)";

if ($conn->query($sql)) {
    echo $conn->error;
    die;
}
echo $conn->insert_id;

$conn->close();
