<?php

//itt kötjük össze az adatbázissal, definiáljuk  a root-ot.
$user = "root"; //nincs jszó beállítva a rootnak
$pass = ""; //nem definiáltunk jszót.
$db = "employeeop"; //meghívjuk az adatb-t.

$conn = new mysqli("localhost", $user, $pass, $db); //példányosítom a mysqli-t, megadom a kötelező változókat. Létrehozom a kapcsolatot.

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // ha nem jön létre a kapcsolat, akkor errort ad.
}
