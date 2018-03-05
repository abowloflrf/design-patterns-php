<?php
namespace DesignPattern\BehavioralPatterns\Command;

class Receiver
{
    public function write($str)
    {
        echo $str;
    }
}