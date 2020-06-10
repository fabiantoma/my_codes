<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>termek</title>
</head>
<body>

<pre>
<?php
    $x=array(
    

        array(
            "name"=>"Samsung Galaxy","ar"=>100000,"szin"=>"fekete","id"=>"s8"),
            
         array(
                "name"=>"Samsung Galaxy","ar"=>150000,"szin"=>"kék","id"=>"s10"),
                );
 
  /* var_dump($_GET);  *///elem számosságát vizsgáljuk ha nincs kiválasztva termék hibaüzenetet ad.//
   if(count($_GET)==0){
       print "nem választottál ki terméket";
       die;//A program itt véget ér//
   }
/* print "LOL ez nem hal meg..."; */

$telefonIndex=@$_GET["index"];

$telefonId=@$_GET["id"];

$telefonObjektum=NULL;

if (isset($telefonId)){
    for($i=0;$i<count($x);$i++){
        if($x[$i] ["id"]==$telefonId){
            print  "Telefon neve:" .$x[$i]["name"]."<br>";
            print  "Telefon azonosito:" .$x[$i]["id"]."<br>";
            print  "Telefon szine:" .$x[$i]["szin"]."<br>";
            print  "Telefon ara:" .$x[$i]["ar"]."<br>";
                    die;
        }
       /*  var_dump($x[$i]); */
    }

}
/* print $telefonIndex; */
if(@$x[$telefonIndex]==NULL){
print "Sajnos nincs ilyen termék az adatbázisban";
die;}

print  "Telefon neve:" .$x[$telefonIndex]["name"]."<br>";
print  "Telefon azonosito:" .$x[$telefonIndex]["id"]."<br>";
print  "Telefon szine:" .$x[$telefonIndex]["szin"]."<br>";
print  "Telefon ara:" .$x[$telefonIndex]["ar"]."<br>";


/* var_dump($x[$telefonIndex]) */
/* var_dump($_GET); */
/* var_dump($x[3]); */




/* $y=array("name"=>"Samsung Galaxy","ar"=>100000,"szin"=>"fekete","id"=>"s8");
$tomb=array("Samsung Galaxy S8","Huawei P20","iphone 7");
print "<pre>"; */

?>
</pre>
    
</body>
</html>