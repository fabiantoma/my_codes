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
$post->vasarlo = $data->vasarlo;
$post->termeknev = $data->termeknev;
$post->ar = $data->ar;
$post->darab = $data->darab;
$post->termekId = $data->termekId;



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
