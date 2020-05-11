<?php



header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json");



include "config.php";
include "post.php";



$database = new Db();
$db = $database->connect();



$post = new Post($db);



$post->id = isset($_GET["id"]) ? $_GET["id"] : die();

$result = $post->readSingle();



$num = $result->rowCount();

if ($num > 0) {

    $postArray = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);
        $postItem = array(
            "vasarlo" => $vasarlo,
            "termeknev" => $termeknev,
            "ar" => $ar,
            "darab" => $darab,
            "name" => $name,
            "id" => $id,
            "termekId" => $termekId
        );

        array_push($postArray, $postItem);
    }

    echo json_encode($postArray);
} else {

    echo json_encode(
        array("message" => "Element was not found")
    );
}
