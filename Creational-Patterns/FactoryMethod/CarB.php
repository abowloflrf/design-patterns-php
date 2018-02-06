<?php
namespace DesignPattern\CreationalPatterns;

require_once('CarInterface.php');
class CarB implements Car
{
    private $type = "Type B";
    public function getType()
    {
        return $this->type;
    }
}