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
        include "config/db.php";

        $action = isset($_GET["action"]) ? $_GET["action"] : "";
        if ($action == "deleted") {
            echo "<div class='alert alert-success'>Record was deleted</div>";
        }
        $query = "Select id, name, description, price From products Order By id Desc";
        $stmt = $con->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();

        echo '<a href="create.php" class="btn btn-primary m-b-1em">Create</a>';

        if ($num > 0) {

            echo "<table class='table table-hover table-responsive table-bordered'";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Description</th>";
            echo "<th>Price</th>";
            echo "<th>Action</th>";

            echo "</tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";
                echo "<td>&#36;{$price}</td>";

                echo "<td>";

                echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
                echo "<a href='update.php?id={$id}'class='btn btn-primary m-r-1em'>Edit</a>";
                echo "<a class='btn btn-danger m-r-1em' onclick='deleteUser({$id})'>Delete</a>";

                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<div class='alert alert-danger'>No records found.</div>";
        }

        ?>
    </div>

    <script>
        function deleteUser(id) {

            var answer = confirm("Are you sure");
            if (answer) {
                window.location = "delete.php?id=" + id;
            }
        }
    </script>



</body>

</html>