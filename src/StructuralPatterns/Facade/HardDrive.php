<?php
namespace DesignPattern\StructuralPatterns\Facade;

class HardDrive
{
    public function read($addr)
    {
        echo "HD is reading from $addr...\n";
    }
    public function write($addr)
    {
        echo "HD is writing to $addr...\n";
    }
}