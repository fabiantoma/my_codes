<?php

include "namespace.php";
include "namespace2.php";
include "namespace3.php";


use foo;
use bar;
use animate;


echo \foo\Cat::says() . "<br/>";
echo \bar\Dog::says() . "<br/>";
echo \animate\Animal::breathes() . "<br/>";
