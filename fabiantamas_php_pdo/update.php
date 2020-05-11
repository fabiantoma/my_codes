<?php


header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json");
header("Allow-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Allow-Control-Allow-Methods, Authorization, X-Requested-With");



include "config.php";
include "post.php";

$database = new Db();
$db = $database->connect(); //Adatbázis meghívás//



$post = new Post($db);



$data = json_decode(file_get_contents("php://input")); //lekéri a tartalmat//


try {
    $post->id = $data->id;
    $post->vasarlo = $data->vasarlo;
    $post->ar = $data->ar;
    $post->darab = $data->darab;
    $post->termeknev = $data->termeknev;
    $post->termekId = $data->termekId;
} catch (Exception $e) {
    echo "Caught exception:" . $e->getMessage() . "\n";
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
