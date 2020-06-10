<?php

include "config/db.php";
try {

    $id = isset($_GET["id"]) ? $_GET["id"] : die("Error:Record ID not found");

    $query = "Delete from products where id=?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);
    if ($stmt->execute()) {

        header("Location:index.php?action=deleted");
    } else {
        die("Unable to delete record.");
    }
} catch (PDOException $exeption) {
    die("Error:" . $exeption->getMessage());
}
