<?php
if (!isset($_COOKIE["username"])) {

    print "Bejelentkezés szükséges";
    print "<br><a href='index2.php'>Bejelentkezés</a>";
    die;
}
print $_COOKIE["username"] . "<br>";
print "4 23 45 67 78";
print "<a href='index2.php?logout'>Kijelentkezés</a>";
