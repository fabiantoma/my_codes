<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
</head>
<body>

<form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type ="text" name="fullName">
<input type="submit">
</form>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_REQUEST["fullName"];
    if(empty($name)){
        echo "Name is empty";
    }else {
        echo "$name";
    }
}



?>
</body>
</html>