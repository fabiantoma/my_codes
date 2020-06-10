<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
</head>
<body>
   
<?php
$startDate=strtotime("Saturday");//kiindulási idő,strtotime stringből alakít át dátummá ,tudja értelmezni//
$endDate=strtotime("+6 weeks",$startDate);//6 héten keresztül a szombatok//

while($startDate<$endDate){
    echo date("M-d",$startDate)."<br/>";//kiírja hónap napot//
    $startDate=strtotime("+1 week",$startDate);//egy hetente kell//
}




?>



</body>
</html>