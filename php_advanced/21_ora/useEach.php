<?php

include_once "math.php";
include_once "cirle.php";

use Math\Geomatry;



echo Math\add(2, 3);
echo "<br/>";

$circle = new Math\Geomatry\Cirle(10);
echo $circle->getCircleArea();
