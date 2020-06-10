<?php
include "db.php";
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    die; //vizsgáljuk hogy van e érték,van e kiválasztva valami v.valaki akit updatelni akarunk.//
}
$id = $_GET["id"];
$select = "SELECT*FROM regusers WHERE id='$id'";
if (isset($_POST["btnUpdate"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $hobby = implode(",", $_POST["hobby"]);
    print_r($hobby);
    $country = $_POST["country"];
    $update = "UPDATE regusers SET
name='$name',
email='$email',
gender='$gender',
address='$address',
hobby='$hobby',
country='$country',
Where id='$id'";


    $insert = "Insert into regusers(name,email,gender,address,hobby,country)
    Values ('$name','$email','$gender','$address','$hobby','$country')";


    if (mysqli_query($conn, $insert)) {

?>
        <script>
            alert("Record was inserted succesfully");
        </script>
    <?php

    } else {
    ?>
        <script>
            alert("Error by inserted data");
        </script>
<?php


    }
}




?>
<html>

<head></head>

<body>
    <center>

        <form method="post" action="update.php?id=<?php print $id; ?>">
            <!-- meg kell adni az id-is -->

            <?php

            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                /*   print $row["name"];
                print $row["email"]; */

            ?>

                <h2>Update form</h2>
                <table>
                    <tr>
                        <td>Name</td>
                        <td> <input type="text" name="name" value="<?php print $row["name"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> <input type="text" name="email" value="<?php print $row["email"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Gender</td><!-- //beleraktuk az input mezőkbe a php értékeket// -->
                        <td> <input type="radio" name="gender" value="male" <?php print $row["gender"] == "male" ? "checked" : ""; ?>><span>Male</span>
                            <input type="radio" name="gender" value="female" <?php print $row["gender"] == "male" ? "" : "checked"; ?>><span>FeMale</span></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td> <textarea name="address">"<?php print $row["address"]; ?>"</textarea></td>
                    </tr>
                    <tr>
                        <td>Hobbies:</td>
                        <td>
                            <?php
                            $hobbies = explode(",", $row["hobby"]);
                            /* var_dump($hobbies);
                            print in_array("travel", $hobbies); */
                            ?>
                            <input type="checkbox" name="hobby[]" value="music" <?php print in_array("music", $hobbies) ? "checked" : ""; ?>>music
                            <input type="checkbox" name="hobby[]" value="movies" <?php print in_array("movies", $hobbies) ? "checked" : ""; ?>>movies
                            <input type="checkbox" name="hobby[]" value="games" <?php print in_array("games", $hobbies) ? "checked" : ""; ?>>games
                            <input type="checkbox" name="hobby[]" value="travel" <?php print in_array("travel", $hobbies) ? "checked" : ""; ?>>travel
                        </td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td> <select name="country">
                                <option value="Hungary" <?php print $row["country"] == "Hungary" ? "selected" : ""; ?>>Hungary</option>
                                <option value="Germany" <?php print $row["country"] == "Germany" ? "selected" : ""; ?>>Germany</option>
                                <option value="England" <?php print $row["country"] == "England" ? "selected" : ""; ?>>England</option>
                                <option value="Australia" <?php print $row["country"] == "Australia" ? "selected" : ""; ?>>Australia</option>

                            </select></td>

                    </tr>
                </table>

                <input type="submit" name="btnUpdate" value="update">

        </form>
    <?php
            }
    ?>
    </center>
</body>

</html>