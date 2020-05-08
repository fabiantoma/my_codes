<?php
session_start();

// initializing variables

$fullname    = "";
$username = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'exam');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Adja meg a felhasználónevét");
    }
    if (empty($fullname)) {
        array_push($errors, "Adja meg a teljes nevét");
    }
    if (empty($password_1)) {
        array_push($errors, "Adja meg a jelszavát");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "A két jelszó nem egyezik");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM account WHERE username='$username' OR fullname='$fullname' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Felhasználónév már létezik");
        }

        /*  if ($user['fulln'] === $email) {
            array_push($errors, "email already exists");
        } */
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO account (fullname,username, password) 
  			  VALUES('$fullname','$username','$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Bejelentkezve";
        header('location: index.php');
    }
}
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Adja meg a felhasználónevét");
    }
    if (empty($password)) {
        array_push($errors, "Adja meg a jelszót ");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM account WHERE username='$username' AND password='$password'AND IsCitecEmployee='1'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Bejelentkezve";

            header('location: index.php');
        } else {
            array_push($errors, "Helytelen felhasználónév/jelszó kombináció");
        }
    }
}
