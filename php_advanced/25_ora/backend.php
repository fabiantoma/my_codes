<?php



include "db.php";



class DataOperation extends Database
{
    public function deleteRecord($table, $where)
    {
        $sql = "Delete from " . $table;
        $condition = "";

        foreach ($where as $key => $value) {
            $condition .= $key . "='" . $value . "'";
        }


        $sql .= " WHERE " . $condition;
        echo "$sql";
        $query = mysqli_query($this->conn, $sql);
        if ($query) {
            header("location:index.php");
        }
    }
    public function insertRecord($table, $fields)
    {

        $sql = "Insert into " . $table;
        $sql .= " (" . implode(",", array_keys($fields)) . ") Values "; //összefűzi mezőket//
        $sql .= " ('" . implode("','", array_values($fields)) . "')";

        $query = mysqli_query($this->conn, $sql);

        if ($query) {

            header("location: index.php");
        }
    }

    public function selectRecordById($table, $where)
    {

        $sql = "Select * from " . $table;

        $condition = ""; //feltétele a where-nek egy doboz amit feltölthetünk //

        foreach ($where as $key => $value) {

            $condition .= $key . "='" . $value . "'";
        }

        $sql .= " Where " . $condition;
        $query = mysqli_query($this->conn, $sql);

        $row = mysqli_fetch_array($query);

        return $row;
    }

    public function selectRecords($table) //paramétert vár ami a tábla neve lesz//
    {

        $sql = "Select * from " . $table; //összes rekord lekérdezése,összerakása amit meg szeretnénk hívni és atáblát hozzá csatolom//
        $query = mysqli_query($this->conn, $sql); //meghívom a függvény segítségéval //

        $arrayOfData = array(); //Querybe resultból visszajönnek az elemek értékkel együtt, definiáljuk a tömböt//

        while ($row = mysqli_fetch_assoc($query)) { //mindaddig beadja a query étékeit végigmegyünk atömbbön és hozzáadom egy sorhoz és belepussolom az array adatbázisba ,amig van sorom//

            $arrayOfData[] = $row;
        }

        return $arrayOfData; //amig van visszatérési érték,amibe benne vannak a soraim//
    }

    public function updateRecord($table, $where, $fields)
    {

        $sqlUpdate = "Update " . $table . " Set ";
        $condition = "";
        $whereCondition = "";

        foreach ($fields as $key => $value) {

            $condition .= $key . "='" . $value . "',";
        }

        $sqlUpdate .= $condition;
        $sqlUpdate = rtrim($sqlUpdate, ",");

        foreach ($where as $key => $value) {

            $whereCondition .= $key . "='" . $value . "'";
        }

        $sqlUpdate .= " Where " . $whereCondition;

        $query = mysqli_query($this->conn, $sqlUpdate);

        if ($query) {

            header("location: index.php");
        }
    }
}



$obj = new DataOperation("localhost", "root", "", "medicinestock");

if (isset($_GET["delete"])) {
    $id = $_GET["id"] ?? null;
    $where = array("id" => $id);
    $obj->deleteRecord("medicines", $where);
}

if (isset($_POST["submit"])) {

    $medicineFields = array(
        "name" => $_POST["name"],
        "quantity" => $_POST["quantity"]
    );

    $obj->insertRecord("medicines", $medicineFields);
}



if (isset($_POST["update"])) {

    $id = $_POST["id"];
    $where = array(
        "id" => $id
    );

    $fields = array(
        "name" => $_POST["name"],
        "quantity" => $_POST["quantity"]
    );

    $obj->updateRecord("medicines", $where, $fields);
}
