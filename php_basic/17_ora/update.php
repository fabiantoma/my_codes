<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Update products</title>

    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="page-header">
            <h1>Read Products</h1>
        </div>

        <?php


        $id = isset($_GET["id"]) ? $_GET["id"] : die("Error:Record ID not found"); //ternary operátor//
        include "config/db.php";
        try {
            $query = "Select id, name, description, price From products WHERE id=?";
            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
        } catch (PDOException $exeption) {
            die("Error:" . $exeption->getMessage());
        }

        ?>

        <?php
        if ($_POST) {

            $query = "Update products
    Set name=:name,description=:description,price=:price
    where id=:id";
            $stmt = $con->prepare($query);

            $name = htmlspecialchars(strip_tags($_POST["name"]));
            $description = htmlspecialchars(strip_tags($_POST["description"]));
            $price = htmlspecialchars(strip_tags($_POST["price"]));


            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":id", $id);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Record was updated<div>";
            } else {
                echo "<div class='alert alert-success'>Record was updated<div>";
            }
        }


        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?> ">
            <table class='table table-bordered table-hover table-bordered'>
                <tr>
                    <td>Name</td>
                    <td><input type=" text" name="name" value="<?php echo "$name"; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><input type="text" name="description" value="<?php echo "$description"; ?>"></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="price" value="<?php echo "$price"; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-primary" value="Save changes">
                        <a href="index.php" class="btn btn-danger">Back to read products</a>
                    </td>
                </tr>
            </table>

        </form>

    </div>
</body>

</html>