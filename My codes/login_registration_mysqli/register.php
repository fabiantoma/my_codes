<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h2>Regisztrációs adatlap</h2>
    </div>

    <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Teljes név</label>
            <input type="text" name="fullname" value="<?php echo $fullname; ?>">
        </div>
        <div class="input-group">
            <label>Felhasználónév</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Jelszó</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Jelszó megerősítés</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Regisztráció</button>
        </div>
        <p>
            Regisztrált vagy? <a href="login.php">Bejelentkezés</a>
        </p>
    </form>
</body>

</html>