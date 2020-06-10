<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>global</title>
</head>
<body>

<pre> 
<?php


//echo-val és print-tel nem bír tömböt kiírni//



//ezzel ki lehet írni//


//kettő globalst összeadunk//
$f=12;
$GLOBALS["x"]=12;
$GLOBALS["y"]=14;
$GLOBALS["z"]=$x+$y;  //ez rossz rossz rossz,ne használjuk//
$GLOBALS["zs"]=$GLOBALS["x"]+$GLOBALS["y"];


var_dump($f); //kivonat csak adatok kiírására alkalmazható//



/* var_dump($_SERVER); */

print $_SERVER["REQUEST_METHOD"] ."\n";

var_dump($_REQUEST);
?>
</pre>
    
</body>
</html>