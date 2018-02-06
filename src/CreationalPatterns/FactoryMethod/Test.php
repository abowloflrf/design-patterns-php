<?php
namespace DesignPattern\CreationalPatterns\FactoryMethod;

class Test
{
    public function run()
    {
        $factory = new CarFactory();
        $car_a = $factory->produce('A');
        $car_b = $factory->produce('B');

        echo $car_a->getType() . "\n";
        echo $car_b->getType() . "\n";
    }
}
