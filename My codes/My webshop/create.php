<?php



header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json"); //fájltipus meghat//
header("Allow-Control-Allow-Methods: POST"); //küldési metódus//
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Allow-Control-Allow-Methods, Authorization, X-Requested-With");



include "config.php";
include "post.php";



$database = new Db();
$db = $database->connect();



$post = new Post($db);



$data = json_decode(file_get_contents("php://input")); //json-t beküldjük inputról és azt fogja és dekódolja a databa és objektum lesz//


//értéket adunk úgy hogy data title fieldje felveszi a post változóit mint érték//
$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;



if ($post->create()) {
    //
    echo json_encode(
        array("message" => "Post was created")
    );
} else {

    echo json_encode(
        array("message" => "Post wasn't created")
    );
}
