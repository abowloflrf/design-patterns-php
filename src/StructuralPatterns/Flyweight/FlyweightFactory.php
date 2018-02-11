<?php
namespace DesignPattern\StructuralPatterns\Flyweight;

class FlyweightFactory implements \Countable
{
    private $pool = [];
    public function get($name)
    {
        if (!isset($this->pool[$name])) {
            $this->pool[$name] = new CharacterFlyweight($name);
            return $this->pool[$name];
        }
    }
    public function count()
    {
        return count($this->pool);
    }
}