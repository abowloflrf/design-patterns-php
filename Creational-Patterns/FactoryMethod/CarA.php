<?php
namespace DesignPattern\CreationalPatterns;

require_once('CarInterface.php');
class CarA implements Car
{
    private $type = "Type A";
    public function getType()
    {
        return $this->type;
    }
}