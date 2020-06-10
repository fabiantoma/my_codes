<html>

<head>
    <title>Webshop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>


<body>

    <div class="container">

        <div class="page-header">
            <h1>Create Product</h1>
            <?php
            if ($_POST) {
                include "config/db.php";
                try {
                    $query = "Insert into products Set name=:name, description=:description,price=:price,image=:image,created=:created";

                    $stmt = $con->prepare($query);
                    $name = htmlspecialchars(strip_tags($_POST["name"]));
                    $description = htmlspecialchars(strip_tags($_POST["description"]));
                    $price = htmlspecialchars(strip_tags($_POST["price"]));
                    $image = !empty($_FILES["image"]["name"])
                        ? sha1_file($_FILES["image"]["tmp_name"]) . "-" . basename($_FILES["image"]["name"]) : "";

                    $image = htmlspecialchars(strip_tags($image));

                    $stmt->bindparam(":name", $name);
                    $stmt->bindparam(":description", $description);
                    $stmt->bindparam(":price", $price);
                    $stmt->bindParam(":image", $image);

                    $created = date('Y-m-d H:i:s');
                    $stmt->bindparam(":created", $created);

                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Record was saved</div>";


                        if ($image) {

                            $target_directory = "uploads/";
                            $target_file = $target_directory . $image;
                            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

                            $file_upload_error_message = "";

                            $check = getimagesize($_FILES["image"]["tmp_name"]);
                            if (!$check) {
                                $file_upload_error_message .= "<div>Submitted file is not image</div>";
                            }
                            $allowed_file_types = array("jpg", "jpeg", "gif");
                            if (!in_array($file_type, $allowed_file_types)) {
                                $file_upload_error_message .= "<div>JPG,JPEG,GIF,PNG are just allowed</div>";
                            }
                            if ($_FILES["image"]["size"] > (1024000)) {
                                $file_upload_error_message .= "<div>File is to large</div>";
                            }
                            if (!is_dir($target_directory)) {
                                mkdir($target_directory, 0777, true);
                            }
                            if (empty($file_upload_error_message)) {
                                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                    echo "<div class='alert alert-danger>";
                                    echo "<div >Unabled to upload photo</div>";
                                    echo "</div>";
                                }
                            }
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Unable to save record</div>";
                        echo "<div >Unabled to upload photo</div>";
                        echo "<div >{$file_upload_error_message}</div>";
                        echo "</div>";
                    }
                } catch (PDOException $exeption) {
                    die("Error:" . $exeption->getMessage());
                }
            }

            ?>
        </div>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" class="form-control" name="name"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><input type="text" class="form-control" name="description"></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" class="form-control" name="price"></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                        <a href="index.php" class="btn btn-danger">Back to products</a>
                    </td>
                </tr>

            </table>


        </form>
    </div>


</body>




</html>