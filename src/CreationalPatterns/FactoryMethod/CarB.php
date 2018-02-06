<?php
namespace DesignPattern\CreationalPatterns\FactoryMethod;

class CarB implements CarInterface
{
    private $type = "Type B";
    public function getType()
    {
        return $this->type;
    }
}