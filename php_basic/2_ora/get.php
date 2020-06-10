<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
</head>
<body>

<form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type ="text" name="fullName">
Email: <input type ="text" name="email">
<input type="submit">

</form>

<?php 
if(isset("GET"["submit"])){
    $name= $_GET["fullName"];
    $email= $_GET["email"];

    echo "Welcome $name <br/>";
    echo "E-mail $email <br/>";
    }




?>
</body>
</html>