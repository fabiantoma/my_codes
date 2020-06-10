<?php
$email = "john.doe@example.com";
$email = filter_var($email, FILTER_SANITIZE_EMAIL); //szanitálja ha nincs akkor nem eszi meg a rossz email címeket//
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email is valid:" . $email;
} else {

    echo "Email is invalid";
}
