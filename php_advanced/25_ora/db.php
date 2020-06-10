<?php



class Database
{

    public $conn;
    private $serverName; //definiálom meg azokat a változókat amelyek az objektum példányosításkor használunk//
    private $userName;
    private $password;
    private $dbName;

    public function __construct($serverName, $userName, $password, $dbName) //a változók kezdeti értékekkel való feltöltése a kapcsolatban //
    {
        $this->serverName = $serverName; //a conn is megkapja maga értéket legalul//
        $this->userName = $userName;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->conn = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);
    }
}

/* $odj = new Database("localhost", "root", "", "medicinestock"); */
