<?php






class Db
{

    public $conn;
    public $servername = "localhost";
    public $dbname = "vizsga1";
    public $user = "root";
    public $password = "";

    public function connect()
    {

        try {

            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;
        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
        }
    }
}
