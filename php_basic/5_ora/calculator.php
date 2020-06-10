
<?php
$result="";
$value1="";
$value2="";
$signature="";

if(isset($_POST["submit"]))
{
    $value1=$_POST["value1"];
    $value2=$_POST["value2"];
    $signature=$_POST["operator"];


    switch($signature){
        case "+":
            $result=$value1+$value2;
        break;
        case "-":
            $result=$value1-$value2;
        break;
        case "*":
            $result=$value1*$value2;
        break;
        case "/":
            $result=$value1/$value2;
        break;
        case "%":
            $result=$value1%$value2;
        break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>calculator</title>
</head>
<body>


<h1>Calculator Application in PHP</h1>
<form  method="post" action="calculator.php">

Value1: <input type="number" name="value1" ></br/>
Value2: <input type="number" name="value2" ></br/>

 Operator
 <select name="operator" >
 <option value="+">+</option>
 <option value="-">-</option>
 <option value="*">*</option>
 <option value="/">/</option>
 <option value="%">%</option>
 
 </select>



 Result: <input type="text" name="result" disabled="true" value="<?php echo $result;?>">
 <br/>

 <input type="submit" name="submit" value="submit">
 <br/>
</form>


</body>
</html>