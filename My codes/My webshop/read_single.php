<?php



header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json");



include "config.php";
include "post.php";



$database = new Db();
$db = $database->connect();



$post = new Post($db);



$post->id = isset($_GET["id"]) ? $_GET["id"] : die(); //rávizsgálunk hogy létezik e url be van e id paraméter akkor adja vissza az idnak megfelelő paramétert ha nincs akkor die//



$result = $post->readSingle();



$num = $result->rowCount(); //van a lekérdezési eredménynek van e erdménye ha van  megszámolja sorok számát//



if ($num > 0) {

    $postArray = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);
        $postItem = array(
            "title" => $title,
            "body" => $body,
            "author" => $author,
            "name" => $name,
            "id" => $id,
            "category_id" => $category_id
        );

        array_push($postArray, $postItem);
    }

    echo json_encode($postArray);
} else {

    echo json_encode(
        array("message" => "Element was not found")
    );
}
