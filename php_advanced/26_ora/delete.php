<?

include "employe_handler.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $employeeHandler = new EmployeeHandler();
    $employee = $employeeHandler->selectRecordById("employees", $id);
}

if (isset($_POST["submit"])) {
    $id = $_GET["id"];
    $name = $_POST["name"];
    $city = $_POST["city"];
    $designation = $_POST["designation"];


    $fields = [
        "name" => $name,
        "city" => $city,
        "designation" => $designation,
    ];
    $employeeHandler = new EmployeeHandler();
    $employeeHandler->delete($id);
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
            <div class="jumbotron">Edit Employee

            </div>
            <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control " value="<?php echo $employee["name"]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control " value="<?php echo $employee["city"]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" class="form-control " value="<?php echo $employee["designation"]; ?> " readonly>
                </div>
                <button type="submit" name="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>






</body>

</html>