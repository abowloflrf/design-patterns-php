<?php
namespace DesignPattern\StructuralPatterns\Facade;

class Test
{
    public function run()
    {
        $cpu = new CPU;
        $ram = new RAM;
        $hd = new HardDrive;
        $pc = new ComputerFacade($cpu, $ram, $hd);

        $pc->run();
    }
}