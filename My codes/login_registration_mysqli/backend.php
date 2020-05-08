<?php


include "db.php";
//admin.php eleje//
if (isset($_POST["readrecord"])) {

    $response = "<table class='table table-bordered table-stripped'>
		<tr>
			<th>No.</th>
			<th>Név</th>
			<th>Születési év</th>
			<th>Email cím</th>
			<th>Telefonszám</th>
			<th>Munkahely</th>
			<th>Munkakör</th>
            <th>Read</th>
            <th>Update</th>
			<th>Delete</th>
		</tr>";

    $displayQuery = "Select * from guest";
    $result = mysqli_query($conn, $displayQuery);

    if (mysqli_num_rows($result) > 0) {

        $number = 1;
        while ($row = mysqli_fetch_array($result)) {

            $response .= '<tr>
						<td>' . $number . '</td>
						<td>' . $row["name"] . '</td>
						<td>' . $row["borntobe"] . '</td>
						<td>' . $row["email"] . '</td>
						<td>' . $row["mobile"] . '</td>
						<td>' . $row["workplace"] . '</td>
						<td>' . $row["job"] . '</td>
						<td>
							<button class="btn btn-success" onclick="ReadUserDetails(' . $row['id'] . ')">Read</button>
                        </td>
                        <td>
							<button class="btn btn-primary" onclick="GetUserDetails(' . $row['id'] . ')">Update</button>
						</td>
						<td>
							<button class="btn btn-danger" onclick="DeleteUser(' . $row['id'] . ')">Delete</button>
						</td>
					</tr>';
            $number++;
        }
    }

    $response .= "</table>";
    echo $response;
}

if (isset($_POST["addRecord"])) {
    $name = $_POST["name"];
    $borntobe = $_POST["borntobe"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $workplace = $_POST["workplace"];
    $job = $_POST["job"];

    $insertQuery = "INSERT into guest(name, borntobe, email, mobile, workplace, job) VALUES ('$name','$borntobe','$email','$mobile',' $workplace',' $job')";
    $result = mysqli_query($conn, $insertQuery);
    if ($result) {
        echo "1 record was added";
    } else {
        die;
    }
}

if (isset($_POST["userId"]) && isset($_POST["userId"]) !== "") {
    $userId = $_POST["userId"];
    $query = "select * from guest where id='$userId'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die;
    }

    $response = array();

    if (mysqli_num_rows($result) > 0) {
        $record = mysqli_fetch_assoc($result);
        $response = $record;
    } else {
        $response["status"] = 200;
        $response["message"] = "Data not found";
    }

    echo json_encode($response);
} else {

    $warning = array();
    $warning["status"] = 403;
    $warning["message"] = "Invalid Request!";
}
//UPDATE

if (isset($_POST["updateRecord"])) {
    $hiddenUserId = $_POST["hiddenUserId"];
    $name = $_POST["name"];
    $borntobe = $_POST["borntobe"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $workplace = $_POST["workplace"];
    $job = $_POST["job"];

    $updateQuery = "Update guest Set name='$name',borntobe=' $borntobe ',email='$email',mobile='$mobile',workplace='$workplace',job=' $job'where id='$hiddenUserId'";

    $result = mysqli_query($conn, $updateQuery);

    if (!$result) {
        die("Update was failed!");
    }
}

//DELETE

if (isset($_POST["deleteId"])) {
    $deleteId = $_POST["deleteId"];
    $deleteQuery = "Delete from guest where id='$deleteId'";
    mysqli_query($conn, $deleteQuery);
}
