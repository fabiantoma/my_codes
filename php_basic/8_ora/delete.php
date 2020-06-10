<?php

include "db.php";
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {

    $id = $_GET["id"];
    $delete = "Delete from regusers where id='$id'";

    if (mysqli_query($conn, $delete)) {
?>
        <script>
            alert("Record was deleted succesfully!");
        </script>
        <script>
            window.location.href = "index.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error by deleting data!");
        </script>

<?php
    }
}
