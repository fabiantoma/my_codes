<?php

require_once "common.php";
$connString = "mysql:host=" . $host . ";dbname=" . $dbname;
try {
    $conn = new PDO($connString, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tranzakcioengedelyezett = true;

    $conn->beginTransaction();
    /* 
    $sql = "INSERT INTO users (username,password,permission) VALUES ( pistike , 123456,0)"; */
    $conn->exec("INSERT INTO users (username,password,permisson) VALUES ( 'pistike1' , '123456',0)"); //nem várunk választ ezért az executot használjuk//
    $conn->exec("INSERT INTO users (username,password,permisson) VALUES ( 'pistike2' , '123456',0)");

    /* $conn->exec("INSERT INTO users (id,username,password,permisson) VALUES ( 12,'pistike' , '123456',7)"); */

    $tranzakcioengedelyezett = false;
    if ($tranzakcioengedelyezett) {
    } else $conn->commit();
    $conn->rollback();

    echo $conn->lastInsertId();
} catch (PDOException $e) {
    echo "Connection failed:" . $e->getMessage();
    die;
}
$conn = NULL;
