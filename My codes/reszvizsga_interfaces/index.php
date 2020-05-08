<?php

require "server.php";



$car2 = new Auto("ferrari", "red", 12435678, true);

$car3 = new Auto("Toyota", "black", 89765456, true);

$car5 = new Auto("Mazda3", "blue", 6754391, false);

$car5->showInfo();
$car5->isCabriolet();
$car5->start();
$car5->start();
$car5->stop();
$car5->stop();
$car5->gurul();
$car5->start();
$car5->gurul();



$motor1 = new Motor("Ducatti", "green", "uxt445");
$motor2 = new Motor("Honda", "black", "uvz765");
$motor3 = new Motor("Komár", "hotred", "uht645");
$motor1->showInfo();
$motor1->start();
$motor1->start();
$motor1->stop();
$motor1->stop();
$motor1->gurul();
$motor1->start();
$motor1->gurul();


$car2->showInfo();
$car2->start();
$car2->start();
$car2->stop();
$car2->stop();
$car2->gurul();
$car2->start();
$car2->gurul();
