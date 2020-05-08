<?php


session_start();
if (!isset($_SESSION["username"])) {
    header("location:login.php");
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
    <p>Ön utolsó bejelentkezésésnek dátuma: <b><?php echo date('Y-m-d'); ?></b>
    </p>
    <div>
        <a href="logout.php">Kijelentkezés</a>
    </div>
    <div class="d-flex justify-content-end">
        <h4>Reisztráljon a következő konderenciánkra:</h4>
        <br>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Regisztrálok</button>
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
                    <button type="button" id="buttonUpdate" class="btn btn-primary display-none" data-dismiss="modal" onclick="UpdateDetails()">Update</button>
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
            var name = $("#name").val();
            var borntobe = $("#borntobe").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var workplace = $("#workplace").val();
            var job = $("#job").val();

            $.ajax({

                method: "POST",
                url: "backend.php",
                data: {

                    addRecord: addRecord,
                    name: name,
                    borntobe: borntobe,
                    email: email,
                    mobile: mobile,
                    workplace: workplace,
                    job: job


                },
                success: function(response, status) {
                    $("#content").html(response);
                    readRecords();
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
                    $('#name').val(user.name);
                    $('#borntobe').val(user.borntobe);
                    $('#email').val(user.email);
                    $('#mobile').val(user.mobile);
                    $('#workplace').val(user.workplace);
                    $('#job').val(user.job);
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

        function UpdateDetails() {

            var updateRecord = "updateRecord";
            var name = $("#name").val();
            var borntobe = $("#borntobe").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var workplace = $("#workplace").val();
            var job = $("#job").val();
            var hiddenUserId = $("#hiddenUserId").val();

            $.ajax({

                method: "POST",
                url: "backend.php",
                data: {

                    updateRecord: updateRecord,
                    name: name,
                    borntobe: borntobe,
                    email: email,
                    mobile: mobile,
                    workplace: workplace,
                    job: job,
                    hiddenUserId: hiddenUserId

                },
                success: function(response, status) {
                    /*  $("#content").html(response); */
                    readRecords();
                }
            });
        }

        function ReadUserDetails(userId) {
            $.ajax({

                method: "POST",
                url: "backend.php",
                data: {
                    userId: userId
                },
                success: function(response, status) {
                    var user = JSON.parse(response);
                    $('#hiddenUserId').val(user.id);
                    $('#name').val(user.name);
                    $('#borntobe').val(user.borntobe);
                    $('#email').val(user.email);
                    $('#mobile').val(user.mobile);
                    $('#workplace').val(user.workplace);
                    $('#job').val(user.job);
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert("Error: ", err.Message);
                },

            })
            $('#myModal').modal("show");
            $('#buttonUpdate').addClass("display-none");
            $('#buttonSave').addClass("display-none");
        }
    </script>

</body>


</html>