<?php
include "backend.php";



?>

<html>

<head>
    <title>Medicine Stock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>



<body>








</body>

<div class="container">
    <div class="jumbotron">
        <h1>Medicine Stock</h1>
    </div>


</div>

<div class="container">

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="panel-primary">

                <div class="panel-heading">Enter medicine details</div>
                <div class="panel-body">



                    <?php
                    if (isset($_GET["update"])) {
                        $id = $_GET["id"] ?? null; //nem nulla
                        $where = array(
                            'id' => $id
                        );

                        $row = $obj->selectRecordById("medicines", $where);



                    ?>


                        <form method="post" action="backend.php">

                            <table class="table table-bordered">

                                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                                <tr>
                                    <td>Medicine name</td>
                                    <td>
                                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td>
                                        <input type="text" class="form-control" name="quantity" value="<?php echo $row['quantity'] ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-success" name="update" value="Update">
                                    </td>
                                </tr>
                            </table>


                        </form>
                    <?php


                    } else {

                    ?>

                        <form method="post" action="backend.php">

                            <table class="table table-bordered">


                                <tr>
                                    <td>Medicine name</td>
                                    <td>
                                        <input type="text" class="form-control" name="name" placeholder="Enter medicine name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td>
                                        <input type="text" class="form-control" name="quantity" placeholder="Enter quantity">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Store">
                                    </td>
                                </tr>
                            </table>


                        </form>
                    <?php
                    }
                    ?>



                </div>


            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Medicine Name</th>
                    <th>Available Stock</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php
                $rowsOfMedicines = $obj->selectRecords("medicines"); //visszatérő értéket beleteszi a medicines adattáblába//
                foreach ($rowsOfMedicines as $medicineItem) { //tartalmazza az associatív tömböt és ezzel végigmegyek ezen a tömbbön


                ?>
                    <tr>

                        <td><?php echo $medicineItem["id"]; ?></td>
                        <td><?php echo $medicineItem["name"]; ?></td>
                        <td><?php echo $medicineItem["quantity"]; ?></td>
                        <td>
                            <a href="index.php?update&id=<?php echo $medicineItem['id'] ?>" class="btn btn-info">Edit</a>
                        </td>
                        <td><a href="backend.php?delete&id=<?php echo $medicineItem['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a></td>
                    </tr>
                <?php
                    //index php csinált dologgal paraméterként hivatkozot a delettel és az id-vel hivatkozok rá hogy melyiket akarom updatelni//          
                    //index php csinált dologgal paraméterként hivatkozot a delettel és az id-vel hivatkozok rá hogy melyiket akarom törölni//
                }
                ?>



            </table>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>




</html>