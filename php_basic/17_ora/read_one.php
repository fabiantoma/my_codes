<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Read records</title>

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
            $image = $row["image"]; //szar//
        } catch (PDOException $exeption) {
            die("Error:" . $exeption->getMessage());
        }

        ?>


        <table class='table table-bordered table-hover table-bordered'>
            <tr>
                <td>Name</td>
                <td><?php echo ("$name") ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo ("$description") ?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><?php echo ("$price") ?></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><?php echo $image ? "<img src='uploads/{$image}' style='width:300px;'>" : "No image found"; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <!-- <input type="submit" class="btn btn-primary" value="Save"> -->
                    <a href="index.php" class="btn btn-danger">Back to read products</a>
                </td>
            </tr>
        </table>



    </div>
</body>

</html>