<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json");
header("Allow-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Allow-Control-Allow-Methods, Authorization, X-Requested-With");



include "config.php";
include "post.php";

$database = new Db();
$db = $database->connect();



$post = new Post($db);



$data = json_decode(file_get_contents("php://input"));


$post->id = $data->id;
if ($post->deleteRecord()) {
    echo json_encode(
        array("message" => "Records was deleted")
    );
} else {

    echo json_encode(
        array("message" => "Post wasn't deleted")
    );
}
