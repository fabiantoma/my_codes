<?php




namespace Math\Geomatry;

use Math;

class Cirle
{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function getCircleArea()
    {
        return Math\PI * $this->radius ** 2;
    }
}
