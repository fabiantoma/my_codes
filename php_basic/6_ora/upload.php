<?php

$target_dir = "uploads/"; //megadjuk a mappát//
$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
if (isset($_POST["submit"])) { //név-re szűr a posttal//

    //MI a jelenlegi mappa//
    //megadjuk hogy mi fajl neve:uploads/azencsaladikepen.jpg//
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    echo "A fájl helye:" . $target_file;

    /* var_dump($_FILES); */
}
