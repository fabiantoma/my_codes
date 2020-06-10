<?php
if (isset($_GET["login"])) { //ha van login akkor beállítjuk a username értéket get login értékre//
    if ($_GET["login"] == "12345678") {
        setcookie("username", $_GET["login"]);
        print $_COOKIE["username"] . ",köszöntünk az oldalon!";
    }
}
if (isset($_GET["logout"])) {
    setcookie("username", "", 1);
    print "Viszlát";
}
/* setcookie("hello", "Tamas", time() + 15 * 24 * 60 * 60); */
print "<br><a href='index3.php'>Felhasznalói felület</a>";
