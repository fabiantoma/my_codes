<?php
include "db.php";
if (isset($_POST["btnInsert"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $hobby = implode(",", $_POST["hobby"]); //Azér hogy több lehetséges hobbi legyen//
    $country = $_POST["country"];

    $insert = "Insert inti regusers(name,email,gender,address,hobby,country)
Values('$name','$email','$gender',$address','$hobby','$country')";

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

<center>

    <form action="gyakorlas.php" method="post">
        <h2>Vásárlók jegyzéke</h2>

        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td> <input type="radio" name="gender" value="male" checked><span>Male</span>
                    <input type="radio" name="gender" value="male"><span>FeMale</span></td>
            </tr>
            <tr>
                <td>Address</td>
                <td> <textarea name="address"></textarea></td>
            </tr>
            <tr>
                <td>Hobbies:</td>
                <td>
                    <input type="checkbox" name="hobby[]" value="music">Music
                    <input type="checkbox" name="hobby[]" value="movies">movies
                    <input type="checkbox" name="hobby[]" value="games">games
                    <input type="checkbox" name="hobby[]" value="travel">Travel
                </td>
            </tr>
            <tr>
                <td>Country</td>
                <td> <select name="country">
                        <option value="Hungary">Hungary</option>
                        <option value="Germany">Germany</option>
                        <option value="England">England</option>
                        <option value="Australia">Australia</option>

                    </select></td>

            </tr>
        </table>


        <input type="submit" name="btnInsert" value="Insert">

    </form>

    <table cellpading='5' border='1'>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Gender</td>
            <td>Address</td>
            <td>Hobby</td>
            <td>Country</td>
            <td>Delete</td>
            <td>Update</td>


        </tr>
        <?php
        $select = "Select*from regusers";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>


                <tr>

                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["gender"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["hobby"]; ?></td>
                    <td><?php echo $row["country"]; ?></td>
                    <td><a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>

                </tr>
        <?php
            }
        } ?>



    </table>





</center>


</html>