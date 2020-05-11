<?php
require_once 'conn.php';

$email = $password = '';
$email_err = $password_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $email_err = 'Enter email address!';
    }

    if (empty($password)) {
        $password_err = 'Enter password!';
    }

    if (empty($email_err) && empty($password_err)) {
        $sql = 'SELECT username, email, password  FROM tbl_user WHERE email = :email';

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            if ($stmt->execute()) {
                if ($stmt->rowCount() === 1) {
                    if ($row = $stmt->fetch()) {
                        $hashed_password = $row['password'];
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['username'] = $row['username'];
                            header('location: index.php');
                        } else {
                            $jelszo_err = 'Wrong password!';
                        }
                    }
                } else {
                    $email_err = 'Wrong email address!';
                }
            } else {
                die('Error!');
            }
        }
        unset($stmt);
    }

    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title>Login</title>
</head>

<body class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Login</h2>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>
                            <div class="col">
                                <a href="register.php" class="btn btn-dark btn-block">Registration</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>