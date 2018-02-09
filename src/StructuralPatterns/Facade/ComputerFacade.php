<?php
namespace DesignPattern\StructuralPatterns\Facade;

class ComputerFacade
{
    protected $ram;
    protected $cpu;
    protected $hd;

    public function __construct(CPU $cpu, RAM $ram, HardDrive $hd)
    {
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->hd = $hd;
    }

    public function run()
    {
        $this->ram->read("0x0000");
        $this->ram->write("0x1000");
        $this->cpu->excute("boom");
        $this->hd->read("0x2000");
        $this->hd->write("0x3000");
    }
}