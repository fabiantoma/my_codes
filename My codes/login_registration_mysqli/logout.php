<?php

session_start();
unset($_SESSION["username"]);
$_SESSION["message"] = "Kijelentkezve";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h2><?php echo $_SESSION["message"]; ?></h2>
    </div>

    <form method="post" action="logout.php">

        <p>
            <a href="login.php">Belépés</a>
        </p>
    </form>
</body>

</html>