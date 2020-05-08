<?php


header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json");


include "config.php";
include "post.php";


$database = new Db();
$db = $database->connect(); //Adatbázis meghívás//


$post = new Post($db); //visszakapom a connection és vár egy értéket és a post conn-i fogják tartani aza adatbázis kapcs//

$result = $post->readCategories();

$num = $result->rowCount();

if ($num > 0) {
    $categoriesArr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $categoryItem = array(
            "id" => $id,
            "name" => $name

        );
        array_push($categoriesArr, $categoryItem);
    }

    echo json_encode($categoriesArr);
} else {
    echo json_encode(
        array("message" => "No category was found")
    );
}
