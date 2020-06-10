
<?php 
$name="";
$email="";
$gender="";
$content="";
$website="";

$nameErr="";
$emailErr="";
$genderErr="";
$contentErr="";
$websiteErr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["name"])){
        $nameErr="Name is req.";
    }else{
        $name=testInput($_POST["name"]);
        if(!preg_match("/^[a-zA-Z]*$/",$name)){//mire kérjük (name)a csak betűket fogajon el és irjon ki errort ha számot adunk meg//
            $nameErr="Only letters and white space are allowed";
        }
    }
        if(empty($_POST['email'])){
            $emailErr="Email is req";
        }else{
            $email=testInput($_POST['email']);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $emailErr="Invalid email adress format.";
            }
        }
        if(empty($_POST["website"])){
            $websiteErr="Website is req.";
        }else{
            $website=testInput($_POST["website"]);
            if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
                $websiteErr="invalid URL";
        }
    }   
    if(empty($_POST["content"])){
        $contentErr=" There is no comment.";
    }else{
        $content=testInput($_POST["content"]);
        
    }
    if(empty($_POST["gender"])){//megnézni mert nem működik//
        $genderErr=" There is no gender.";
    }else{
        $gender=testInput($_POST["gender"]);
        
    }
   }

function testInput($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);

    return $data;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Document</title>
</head>
<body>


<h2>Form validation</h2>

    <form method="post" action=" <?php echo $_SERVER['PHP_SELF']; ?>">
    
    Name: <input type="text" name="name">
    <span class="error">*<?php echo $nameErr; ?></span>
    <br>
    Email: <input type="text" name="email">
    <span class="error">*<?php echo $emailErr; ?></span>
    <br>
    Website: <input type="text" name="website">
    <span class="error">*<?php echo $websiteErr; ?></span>
    <br>
    Comment: <textarea  name="content" row="5" col="40"></textarea><br/>
    <span class="error">*<?php echo $contentErr; ?></span>
    <br>

    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">*<?php echo $websiteErr; ?></span><br/>


    <input type="submit" name="submit">
    </form>








</body>
</html>