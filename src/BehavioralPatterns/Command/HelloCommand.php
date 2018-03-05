<?php

namespace DesignPattern\BehavioralPatterns\Command;

class HelloCommand implements CommandInterface
{
    protected $output;

    public function __construct(Receiver $console)
    {
        $this->output = $console;
    }

    public function excute()
    {
        $this->output->write('Hello World!');
    }
}