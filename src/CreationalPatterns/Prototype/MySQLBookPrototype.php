<?php
namespace DesignPattern\CreationalPatterns\Prototype;

class MySQLBookPrototype extends BookPrototype
{
    function __construct()
    {
        $this->topic = 'MySQL';
    }
    function __clone()
    {
    }
}
 