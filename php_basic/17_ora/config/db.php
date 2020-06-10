<?php

$host = "localhost";
$db_name = "webshop";
$username = "root";
$password = "";

try {

    $con = new PDO("mysql:host={$host}; dbname={$db_name}", $username, $password);
} catch (PDOException $exeption) {
    echo "Connection error:" . $exeption->getMessage();
}
