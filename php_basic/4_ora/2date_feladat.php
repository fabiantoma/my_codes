<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
</head>
<body>
    
<?php
$endDate=strtotime("July 04");//kiindulási idő//
$days=ceil(($endDate-time())/60 /60/24);//milisekundumok átváltása nappá//
echo "There are $days days until 4th of July";









?>


</body>
</html>