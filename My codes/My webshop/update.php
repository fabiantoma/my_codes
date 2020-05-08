<?php


header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json");
header("Allow-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Allow-Control-Allow-Methods, Authorization, X-Requested-With");



include "config.php";
include "post.php";

$database = new Db();
$db = $database->connect(); //Adatbázis meghívás//



$post = new Post($db); //visszakapom a connection és vár egy ártéket és a post conn-i fogják tartani aza adatbázis kapcs//



$data = json_decode(file_get_contents("php://input")); //lekéri a tartalmat//


try {
    $post->id = $data->id;
    $post->title = $data->title;
    $post->author = $data->author;
    $post->body = $data->body;
    $post->category_id = $data->category_id;
} catch (Exception $e) {
    echo "Caught exception:" . $e->getMessage() . "\n"; //.........//
}
if ($post->update()) {

    echo json_encode(
        array("message" => "Post was updated succesfully") //enkódolja json tömböt és kiíratjuk //
    );
} else {

    echo json_encode(
        array("message" => "Post wasn't updated")
    );
}
