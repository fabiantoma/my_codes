<?php
include "db.php";
if (isset($_COOKIE["user"])   && !empty($_COOKIE["user"])) { //sütiben akarja tárolni
    if (isset($_GET["logout"])) {
        setcookie("user", "", 0);
        header("Location:index.php");
        die;
    }
    $id = $_COOKIE["user"];
    $query = "SELECT * From users Where id='$id'"; //titkositjuk a jelszavat//
    $data = mysqli_fetch_assoc(mysqli_query($conn, $query));
    print "welcome" . $data["name"] . "!";
    print $data["permisson"] == "ADMIN" ? "<a href='admin/index.php'>Admin felület<a/><br>" : "";
    print "<a href='index.php?logout'>Log out<a/>";
} else {

    if (isset($_POST["submit"])) {

        if (empty($_POST["email"]) || empty($_POST["password"])) { //ha a email és a password üres hiba//
            print "<script>alert('Adja meg felhasználónevét és jelszavát');</script>";
        } else {
            $email = $_POST["email"];
            $password = sha1($_POST["password"]);
            $query = "SELECT * From users Where email='$email' AND password='$password'"; //titkositjuk a jelszavat//
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 0) { //ha nincs ilyen eredmény akkor irja ki//
                print "<script>alert('Nincs ilyen felhasználó');</script>";
            } else {
                $data = mysqli_fetch_assoc($result);
                setcookie("user", $data["id"]);
                header("Location:index.php");
                die;
            }
        }
    }
?>
    <center>
        <h3>Kérlek jelentkezz be</h3>
        <form class="dark" action="index.php" method="POST">
            <input type="email" id="email" name="email" placeholder="email">
            <br>
            <input type="password" id="password" name="password" placeholder="password">
            <input type="submit" id="submit" name="submit" value="login">
            <br>
            <!-- <input type="submit" id="submit" name="submit" value="login"> -->
        </form>
        <a href="reg.php">Regisztráció</a>
    </center>
<?php
}
?>