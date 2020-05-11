<html>
<?php

session_start();
require_once 'conn.php';
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: login.php');
    exit;
}

?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .hide-element {
            display: none;
        }
    </style>

    <script>
        $(document).ready(function() {
            fetchData();

            editItem = function(id) {
                //a változó egy függvény lett,benne megadjuk az id amit
                readCategories(); //be olvassa az értkeket mert be akarom tölteni a modalba//
                $("#updateButton").removeClass("hide-element");
                $("#insertButton").addClass("hide-element");
                ////kiolvassa azt az egy sort ahol az editItem klikk esemény megtörtént//
                readSingeItem(id);
            };
            deleteItem = function(id) {
                $.ajax({
                    type: "POST", //metódusa az post lesz//
                    url: "http://localhost/fabiantamas_php_pdo/delete.php",
                    contentType: "application/json", //json be küldjük//
                    data: JSON.stringify({
                        id: id,
                    }),
                    success: function(data) {
                        fetchData();
                    },
                    error: function(msg) {
                        alert("Error was occured");
                    },
                });
            };

            function readSingeItem(id) {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/fabiantamas_php_pdo/read_single.php?id=" + id + "",
                    success: function(data) {
                        fillModal(data);
                    },
                    error: function(msg) {
                        alert("Error was occured: ", msg);
                    },
                });
            }

            function fillModal(data) {
                $("#rowId").val(data[0].id); //relytett input mező amit felhasználunk az sql parancsban//
                $("#termeknev").val(data[0].termeknev);
                $("#vasarlo").val(data[0].vasarlo);
                $("#ar").val(data[0].ar);
                $("#darab").val(data[0].darab);
                $("#categoryGroup").val(data[0].termekId);

                $("#apiCrudModal").modal("show");
            }

            function fetchData() {
                //a html oldalon ez frissíti az adatokat az adattáblából//
                //get-es endpointot kérünk le adatokat a leírt url-ről,Meghívja ha sikeres akkor a benne lévő függvények lefutnak//
                $.ajax({
                    type: "GET",
                    url: "http://localhost/fabiantamas_php_pdo/read.php",
                    success: function(data) {
                        //ebben létrehozunk a egy értéket //
                        var values = "";

                        for (var i = 0; i < data.length; i++) {
                            //bejárjuk és a létrehozott táblázatba a az elemekhez hozzárendelem//
                            values += "<tr>";
                            values += "<td>" + data[i].vasarlo + "</td>";
                            values += "<td>" + data[i].termeknev + "</td>";
                            values += "<td>" + data[i].name + "</td>";
                            values += "<td>" + data[i].ar + "</td>";
                            values += "<td>" + data[i].darab + "</td>";
                            values +=
                                "<td><button type='button' class='btn btn-primary' id='editButton' name='editButton' onclick='editItem(" +
                                data[i].id +
                                ")'>Edit</button></td>";
                            values +=
                                "<td><button type='button' class='btn btn-danger' id='deleteButton' name='deleteButton' onclick='deleteItem(" +
                                data[i].id +
                                ")'>Delete</button></td>";
                            values += "</tr>";
                        } //ezekkel tudom szerkeszteni//
                        $("tbody").html(values); // és a tbodyhoz hozzáfűzöm a html függvénnyel//
                    },
                    error: function(msg) {
                        alert("Error was occured: ", msg);
                    },
                });
            }

            $("#addButton").click(function() {
                readCategories();
                $(".modal-title").text("Add Data"); //a modal címét adjuk meg//
                $("#updateButton").addClass("hide-element");
                $("#insertButton").removeClass("hide-element");
                $("#apiCrudModal").modal("show");
            });

            $("#insertButton").click(function() {
                //az általam kitöltött adatokat
                var vasarloValue = $("#vasarlo").val();
                var arValue = $("#ar").val();
                var darabValue = $("#darab").val();
                var termeknevValue = $("#termeknev").val();
                var selectedCategoryId = $("#categoryGroup").val(); //kiolvastatom az értékeket//

                var requestObj = {
                    //megfeleltetem a beolvasott értékeket valamilyen...//
                    vasarlo: vasarloValue,
                    termeknev: termeknevValue,
                    ar: arValue,
                    darab: darabValue,
                    termekId: selectedCategoryId,
                };

                $.ajax({
                    type: "POST",
                    url: "http://localhost/fabiantamas_php_pdo/create.php", //api endpoint//
                    data: JSON.stringify(requestObj), //alakítom át Jsoné a objektumot//
                    success: function(data) {
                        fetchData(); //küldéssel lefut a fetch data és frissít az új adatokkal//
                    },
                    error: function(msg) {
                        alert("Error was occured: ", msg);
                    },
                });

                $("#apiCrudModal").modal("hide"); //bezárja a modal ha lefut a progi//
            });

            $("#updateButton").click(function() {
                //klikk esemény rákötve a button id-jú gombra//
                var rowId = $("#rowId").val();
                var termeknevValue = $("#termeknev").val();
                var arValue = $("#ar").val();
                var darabValue = $("#darab").val();
                var vasarloValue = $("#vasarlo").val();
                var selectedtermekId = $("#categoryGroup").val(); //

                var requestObj = {

                    vasarlo: vasarloValue,
                    termeknev: termeknevValue,
                    ar: arValue,
                    darab: darabValue,
                    termekId: selectedtermekId,
                    id: rowId,
                };

                $.ajax({
                    type: "POST",
                    url: "http://localhost/fabiantamas_php_pdo/update.php",
                    data: JSON.stringify(requestObj),
                    success: function(data) {

                        fetchData();
                    },
                    error: function(msg) {
                        alert("Error was occured: ", msg);
                    },
                });
                $("#apiCrudModal").modal("hide");
            });

            function readCategories() {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/fabiantamas_php_pdo/read_categories.php",
                    success: function(data) {
                        var values = "";

                        for (var i = 0; i < data.length; i++) {
                            values +=
                                "<option value=" +
                                data[i].id +
                                ">" +
                                data[i].name +
                                "</option>";
                        }

                        $("#categoryGroup").html(values);
                    },
                    error: function(msg) {
                        alert("Error was occured: ", msg);
                    },
                });
            }
        });
    </script>
</head>

<body>
    <div class="container">

        <div class="col-md-6 well">
            <h3 class="text-primary">You are logged in</h3>
            <hr style="border-top:1px dotted #ccc;" />
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h4>Welcome,</h4>
                <h4>My Webshop!</h4>
                <br />

                <a href="logout.php">Logout</a>
            </div>
        </div>
        <br />

    </div>
    <button type="button" name="addButton" id="addButton" class="btn btn-success btn-xl">
        New Product
    </button>
    <table id="dataTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Vásárló</th>
                <th>Terméknév</th>
                <th>Termék tipus</th>
                <th>Ár</th>
                <th>Darabszám</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>

    <div id="apiCrudModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="apiCrudForm">
                    <div class="modal-header">
                        <h4 class="modal-title">New Product</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label>Id</label>
                            <input type="text" name="rowId" id="rowId" />
                        </div>
                        <div class="form-group">
                            <label>Vásárló</label>
                            <input type="text" name="vasarlo" id="vasarlo" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Terméknév</label>
                            <input type="text" name="termeknev" id="termeknev" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Ár</label>
                            <input type="text" name="ar" id="ar" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Daradszám</label>
                            <input type="text" name="darab" id="darab" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Termék tipus</label>
                            <select class="form-control" id="categoryGroup"></select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="insertButton" name="insertButton" class="btn btn-info">
                            Insert
                        </button>
                        <button type="button" id="updateButton" name="updateButton" class="btn btn-info">
                            Update
                        </button>
                        <button type="button" id="closeButton" data-dismiss="modal" class="btn btn-warning">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>