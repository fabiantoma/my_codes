<?php

class Db
{


    private $conn;
    private $serverName = "localhost";
    private $dbName = "test";
    private $userName = "root";
    private $password = "";

    public function connect()
    {

        try {

            $this->conn = new PDO("mysql:host=$this->serverName;dbName=$this->dbName", $this->userName, $this->password);


            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed:" . $e->getMessage();
        }
    }
}
/* $db1 = new Db;
$db1->connect(); */
