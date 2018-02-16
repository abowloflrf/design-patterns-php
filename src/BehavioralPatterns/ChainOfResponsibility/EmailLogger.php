<?php
namespace DesignPattern\BehavioralPatterns\ChainOfResponsibility;

class EmailLogger extends Logger
{
    public function __construct($mask)
    {
        $this->mask = $mask;
    }

    public function message($msg, $priority)
    {
        if ($priority <= $this->mask) {
            echo "Sending via email: {$msg}\n";
        }

        if (false == is_null($this->next)) {
            $this->next->message($msg, $priority);
        }
    }
}