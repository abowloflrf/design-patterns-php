<?php
namespace DesignPattern\BehavioralPatterns\Command;

class Invoker
{
    protected $command;

    public function setCommand(CommandInterface $cmd)
    {
        $this->command = $cmd;
    }
    public function run()
    {
        $this->command->excute();
    }
}