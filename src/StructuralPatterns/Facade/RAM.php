<?php
namespace DesignPattern\StructuralPatterns\Facade;

class RAM
{
    public function read($addr)
    {
        echo "RAM is reading from $addr...\n";
    }
    public function write($addr)
    {
        echo "RAM is writing to $addr...\n";
    }
}