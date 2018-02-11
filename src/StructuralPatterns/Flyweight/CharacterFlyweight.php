<?php
namespace DesignPattern\StructuralPatterns\Flyweight;

class CharacterFlyweight implements FlyweightInterface
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function render($font)
    {
        return sprintf('Character %s with font %s', $this->name, $font);
    }
}