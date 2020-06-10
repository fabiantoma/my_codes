<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>


    <h2>All records</h2>
    <button class="btn btn-primary" onclick="addRecord()">Új rekord</button>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ajaxCrudMode">Ajax crud operation</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hiddenUserId" class="display-none">
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" id="firstname" class="form-control" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" id="lastname" class="form-control" placeholder="Last name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" id="mobile" class="form-control" placeholder="Phonenumber">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="radio">
                            <label for="">
                                <input type="radio" name="gender" value="male" checked>Male
                                <input type="radio" name="gender" value="male">Female
                            </label>
                        </div>
                        <!-- <input type="text" id="gender" class="form-control" placeholder="Gender"> -->
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="country" id="">
                            <option value="Hungary"></option>
                            <option value="Germany"></option>
                            <option value="Ireland"></option>
                            <option value="USA"></option>
                            <option value="Australia"></option>
                            <option value="England"></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <label for="">
                                <input type="radio" name="gender" value="male" checked>Male
                                <input type="radio" name="gender" value="male">Female
                            </label>
                        </div>
                        <!-- <input type="text" id="gender" class="form-control" placeholder="Gender"> -->
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-succes" data-dismiss="modal" id="buttonSave" onclick="addRecord()">Save</button>
                    <button class="btn btn-danger" data-dismiss="modal" id="buttonClose" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="d-flex justify-content-end" id="content">
        <button type="button" class="btn btn-info btn-lg" data-togle"modal" data-target="xmyModal"></button>
    </div>
    <div class="modal"></div> -->

    <script>
        /*  let actualOperation = "CREATE"; */
        $(document).ready(function() { //az oldal betöltődésekor fog triggerelődni
            readRecords();
        });

        /*    function addRecord() {
               $("#myModal").modal();
               actualOperation = "CREATE";
               $("#firstname").val("");
               $("#lastname").val("");
               $("#email").val("");
               $("#gender").val("");
               $("#mobile").val("");
               $("#country").val("");
               $("#ajaxCrudMode").html("CRUD record: " + actualOperation);
           } */

        /* function updateRecord(id, firstname, lastname, email, mobile, gender, country) {
            $("#myModal").modal();
            actualOperation = "UPDATE";
            $("#updateId").val(id);
            $("#firstname").val(firstname);
            $("#lastname").val(lastname);
            $("#email").val(email);
            $("#gender").val(gender);
            $("#mobile").val(mobile);
            $("#country").val(country);
            $("#ajaxCrudMode").html("CRUD record: " + actualOperation);

        } */
        /* 
                function deleteRecord(id) {
                    $.ajax({
                        method: "POST",
                        url: "backend.php",
                        data: {
                            operation: "DELETE",
                            id: id
                        },
                        success: function(response, status) {
                            alert("A törlés sikerült");
                            readRecords();
                        }
                    });
                } */

        function saveRecord() {
            let id = $("#updateId").val();
            let firstName = $("#firstname").val();
            let lastName = $("#lastname").val();
            let email = $("#email").val();
            let gender = $("#gender").val();
            let mobile = $("#mobile").val();
            let country = $("#country").val();

            $.ajax({
                method: "POST",
                url: "backend.php",
                data: {
                    operation: actualOperation,
                    id: id,
                    firstName: firstName,
                    lastName: lastName,
                    email: email,
                    gender: gender,
                    mobile: mobile,
                    country: country
                },
                success: function(response, status) {
                    alert("A mentés sikerült");
                    readRecords();
                }
            });
        }
        //adminra//
        function readRecords() {
            var readrecord = "readrecord"; //azért hívom meg, mert a backendben ezzel fogok dolgozni
            $.ajax({
                method: "GET",
                url: "backend.php",
                data: {
                    readrecord: readrecord
                },
                success: function(response, status) { //lekezeljük, ha a hívás sikeres volt, és visszaküldte az adatokat

                    $("#content").html(response); //a content id-jú div-hez hozzáadom

                }
            })
        }
    </script>
</body>




<?php
/*  $select = "Select*from guest";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { */

?>
<tr>

    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["birth"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["phonenumber"]; ?></td>
    <td><?php echo $row["workplace"]; ?></td>
    <td><?php echo $row["job"]; ?></td>
    <!-- <td> <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                    <td> <a href="update.php?id=<?php echo $row['id'] ?>">Update</a></td> -->
</tr>
<?php

?>

</table> --> */ -->

</html>