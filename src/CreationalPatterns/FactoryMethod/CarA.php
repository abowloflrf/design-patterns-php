<?php
namespace DesignPattern\CreationalPatterns\FactoryMethod;

class CarA implements CarInterface
{
    private $type = "Type A";
    public function getType()
    {
        return $this->type;
    }
}