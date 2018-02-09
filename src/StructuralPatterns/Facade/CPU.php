<?php
namespace DesignPattern\StructuralPatterns\Facade;

class CPU
{
    public function excute($command)
    {
        echo "CPU is excuting $command...\n";
    }
}