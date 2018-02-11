<?php
namespace DesignPattern\StructuralPatterns\Flyweight;

interface FlyweightInterface
{
    public function render(string $extrinsicState);
}