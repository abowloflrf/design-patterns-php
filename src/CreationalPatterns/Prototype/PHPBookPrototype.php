<?php
namespace DesignPattern\CreationalPatterns\Prototype;

class PHPBookPrototype extends BookPrototype
{
    function __construct()
    {
        $this->topic = 'PHP';
    }
    function __clone()
    {
    }
}