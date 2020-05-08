<?php


header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json");


include "config.php";
include "post.php";


$database = new Db();
$db = $database->connect(); //Adatbázis meghívás//


$post = new Post($db); //visszakapom a connection és vár egy értéket és a post conn-i fogják tartani aza adatbázis kapcs//


$result = $post->read();
$num = $result->rowCount(); //számolja a sorokat és ha nagyobb mint nulla//


if ($num > 0) {

    $postArray = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //addig veszi ki a resultbol amig vannak//

        extract($row); //kiértékeljük//

        $postItem = array(

            "title" => $title,
            "body" => $body,
            "author" => $author,
            "name" => $name,
            "id" => $id,
            "category_id" => $category_id
        );

        array_push($postArray, $postItem); //a tömb elemeit belepusholjuk//
    }

    echo json_encode($postArray); //
} else {

    echo json_encode(
        array("message" => "No post found")
    );
}
//Restfull megszoríthatóság//
//állapotmentesség//
//gyorsítótárazhatóság-Cashelés és frissítés amit a szerver kezel a kliens gépén//
//   Kliens szerver architektúra megszorítás  //
//Kliens szerver achitektúra jelent//
//Hálozatban vannak kliensek és szerverek amik egymással kommunikálnak,nyugalmi áll. amikor lehet vele,Átmeneti amikor küld és fogad.//
//Igényelt kód//
//Szerveren olyan script kódot kell írni amit a böngésző tudjon futtatni//
//egységes interface//
//interfacen keresztül megy a komm. ha több kliens van és mindegyik csak ua kapcs.pontokon,ua.kérésekkel,//
