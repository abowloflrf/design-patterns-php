<?php
namespace DesignPattern\BehavioralPatterns\Command;

class Test
{
    public function run()
    {
        $invoker = new Invoker;
        $receiver = new Receiver;
        $invoker->setCommand(new HelloCommand($receiver));
        $invoker->run();
    }
}