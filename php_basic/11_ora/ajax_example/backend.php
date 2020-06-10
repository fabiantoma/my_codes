<?php


include "db.php";
//admin.php eleje//
if (isset($_POST["readrecord"])) {

    $response = "<table class='table table-bordered table-stripped'>
		<tr>
			<th>No.</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Gender</th>
			<th>Country</th>
            <th>Edit</th>
            <th>Update</th>
			<th>Delete</th>
		</tr>";

    $displayQuery = "Select * from emptable";
    $result = mysqli_query($conn, $displayQuery);

    if (mysqli_num_rows($result) > 0) {

        $number = 1;
        while ($row = mysqli_fetch_array($result)) {

            $response .= '<tr>
						<td>' . $number . '</td>
						<td>' . $row["firstname"] . '</td>
						<td>' . $row["lastname"] . '</td>
						<td>' . $row["email"] . '</td>
						<td>' . $row["mobile"] . '</td>
						<td>' . $row["gender"] . '</td>
						<td>' . $row["country"] . '</td>
						<td>
							<button class="btn btn-success" onclick="GetUserDetails(' . $row['id'] . ')">Edit</button>
                        </td>
                        <td>
							<button class="btn btn-primary" onclick="UpdateEmpDetails(' . $row['id'] . ')">Update</button>
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
//Admin.php vége//
if (isset($_POST["addRecord"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];

    $insertQuery = "INSERT into emptable(firstname, lastname, email, mobile, gender, country) VALUES ('$firstname','$lastname','$email','$mobile','$gender','$country')";
    $result = mysqli_query($conn, $insertQuery);
    if ($result) {
        echo "1 record was added";
    } else {
        die;
    }
}

if (isset($_POST["userId"]) && isset($_POST["userId"]) !== "") {
    $userId = $_POST["userId"];
    $query = "select * from emptable where id='$userId'";
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
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];

    $updateQuery = "Update emptable Set firstname='$firstname',lastname='$lastname',email='$email',mobile='$mobile',gender='$gender',country='$country'where id='$hiddenUserId'";

    $result = mysqli_query($conn, $updateQuery);

    if (!$result) {
        die("Update was failed!");
    }
}

//DELETE

if (isset($_POST["deleteId"])) {
    $deleteId = $_POST["deleteId"];
    $deleteQuery = "Delete from emptable where id='$deleteId'";
    mysqli_query($conn, $deleteQuery);
}
