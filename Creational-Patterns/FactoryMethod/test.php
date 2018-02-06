<?php
namespace DesignPattern\CreationalPatterns;

require_once('CarFactory.php');
require_once('CarA.php');
require_once('CarB.php');

$factory = new CarFactory();
$car_a = $factory->produce('A');
$car_b = $factory->produce('B');

echo $car_a->getType() . "\n";
echo $car_b->getType() . "\n";