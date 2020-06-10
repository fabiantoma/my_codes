<?php

include "employe_handler.php";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $city = $_POST["city"];
    $designation = $_POST["designation"];


    $fields = [
        "name" => $name,
        "city" => $city,
        "designation" => $designation,
    ];
    $employeeHandler = new EmployeeHandler();
    $employeeHandler->insert("employees", $fields);
}
?>




<html>

<head>
    <title>New Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="jumbotron">Add Employee

            </div>
            <form action="create.php" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control " name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control " name="city" placeholder="City">
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" class="form-control " name="designation" placeholder="Designation">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>






</body>

</html>