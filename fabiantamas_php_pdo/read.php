<?php


header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json");


include "config.php";
include "post.php";


$database = new Db();
$db = $database->connect(); //Adatbázis meghívás//


$post = new Post($db);

$result = $post->read();
$num = $result->rowCount();

if ($num > 0) {

    $postArray = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row); //kiértékeljük//

        $postItem = array(

            "vasarlo" => $vasarlo,
            "termeknev" => $termeknev,
            "name" => $name,
            "ar" => $ar,
            "darab" => $darab,
            "id" => $id,
            "termekId" => $termekId
        );

        array_push($postArray, $postItem); //a tömb elemeit belepusholjuk//
    }

    echo json_encode($postArray);
} else {

    echo json_encode(
        array("message" => "No post found")
    );
}
