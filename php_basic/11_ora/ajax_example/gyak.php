<?php


session_start();
if (!isset($_SESSION["username"])) {
    header("location:../autentik/login.php");
};

?>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        .display-none {
            display: none
        }
    </style>
</head>

<body>
    <h1>Üdvözöljük <?php echo  $_SESSION["username"]; ?></h1>
    <div>
        <a href="../autentik/logout.php">Logout</a>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add record</button>
    </div>

    <h2>Konferenciára regisztráltak</h2>
    <div id="content"></div>

    <div class="modal" id="myModal">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Regisztrációs adatlap</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="text" id="hiddenUserId" class="display-none">
                    <div class="form-group">
                        <label>Név</label>
                        <input type="text" id="name" class="form-control" placeholder="Név">
                    </div>
                    <div class="form-group">
                        <label>Születési év</label>
                        <input type="text" id="borntobe" class="form-control" placeholder="Születési év">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" id="mobile" class="form-control" placeholder="Telefonszám">
                    </div>
                    <div class="form-group">
                        <label>Munkahely</label>
                        <input type="text" id="workplace" class="form-control" placeholder="Munkahely">
                    </div>
                    <div class="form-group">
                        <label>Munkakör</label>
                        <select name="job" id="job" class="form-control">
                            <option value="developer">Fejlesztő</option>
                            <option value="tester">Tesztelő</option>
                            <option value="manager">Menedzser</option>

                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="buttonSave" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Save</button>
                    <!--   <button type="button" id="buttonUpdate" class="btn btn-primary display-none" data-dismiss="modal" onclick="UpdateEmpDetails()">Update</button> -->
                    <button type="button" id="buttonClose" class="btn btn-danger" data-dismiss="modal" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            readRecords();
        });

        function addRecord() {
            var addRecord = "addRecord";
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var gender = $("input[name=gender]:checked").val();
            var country = $("#country").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();


            $.ajax({

                method: "POST",
                url: "backend.php",
                data: {

                    addRecord: addRecord,
                    firstname: firstname,
                    lastname: lastname,
                    gender: gender,
                    country: country,
                    email: email,
                    mobile: mobile

                },
                success: function(response, status) {
                    $("#content").html(response);
                }
            });
        }

        function GetUserDetails(userId) {
            $.ajax({

                method: "POST",
                url: "backend.php",
                data: {
                    userId: userId
                },
                success: function(response, status) {
                    var user = JSON.parse(response);
                    $('#hiddenUserId').val(user.id);
                    $('#firstname').val(user.firstname);
                    $('#lastname').val(user.lastname);
                    $('#email').val(user.email);
                    $('#mobile').val(user.mobile);
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert("Error: ", err.Message);
                },
            })
            $('#myModal').modal("show");
            $('#buttonUpdate').removeClass("display-none");
            $('#buttonSave').addClass("display-none");
        }

        function readRecords() {

            var readrecord = "readrecord";
            $.ajax({

                method: "POST",
                url: "backend.php",
                data: {

                    readrecord: readrecord
                },
                success: function(response, status) {
                    $("#content").html(response);
                }
            });

        }

        function closeModal() {
            $("#buttonUpdate").addClass("display-none");
            $("#buttonSave").removeClass("display-none");

        }

        function DeleteUser(deleteId) {
            /* console.log("kismacska"); */
            var conf = confirm("Are you sure to delete this record?");
            if (conf) {
                $.ajax({
                    method: "POST",
                    url: "backend.php",
                    data: {
                        deleteId: deleteId
                    },
                    success: function(response, status) {
                        alert("Record was deleted successfully");
                        readRecords();
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert("Error: ", err.Message);
                    }
                })
            }
        }

        function UpdateEmpDetails() {

            var updateRecord = "updateRecord";
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var gender = $("input[name=gender]:checked").val();
            var country = $("#country").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var hiddenUserId = $("#hiddenUserId").val();

            $.ajax({

                method: "POST",
                url: "backend.php",
                data: {

                    updateRecord: updateRecord,
                    firstname: firstname,
                    lastname: lastname,
                    gender: gender,
                    country: country,
                    email: email,
                    mobile: mobile,
                    hiddenUserId: hiddenUserId

                },
                success: function(response, status) {

                    readRecords();
                }
            });
        }
    </script>

</body>


</html>