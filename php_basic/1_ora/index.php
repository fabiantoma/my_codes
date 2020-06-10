<html>
  <head>
  </head>
  <body>


<h2>Hello php!</h2>


    <?php 

    $var1=23;
    $car="Mazda";
    $x=3;
    $y=4;
    $globalVariable=42;




  echo "Fábián Tomika ";
  echo"<br>";
  Echo "My first variable: ".$var1."!";
  echo"<br>";
  echo"My favourite car is :".$car."!";
  echo"<br>";
  echo $x+$y;
  echo"<br>";
  echo"Ma kaptam egy piros pontot :)";
   echo "<br>";


  function myFunction(){

    echo $GLOBALS["globalVariable"];
    echo "<br>";
    $mydog="nemetjuhasz";
    print "A kutyám: $mydog";
  }


  function myTest(){

    static $staticVariable=0;
    echo $staticVariable;
    $staticVariable++;

  }
  myTest();
  myTest();
  myTest();
  myTest();



  echo "</br>Ez" ,"a" ,"ház" ,"piros";
  print "</br>Hello world</br>";



  $szam1=56.23;
  var_dump($szam1);

  $cars=array ("volvo","ford","Audi");
  var_dump($cars);


    ?>
  </body>
</html>
