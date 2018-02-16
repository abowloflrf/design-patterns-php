<?php
namespace DesignPattern\BehavioralPatterns\ChainOfResponsibility;

class DebugLogger extends Logger
{
    public function __construct($mask)
    {
        $this->mask = $mask;
    }

    public function message($msg, $priority)
    {
        if ($priority <= $this->mask) {
            echo "Writing to debug output: {$msg}\n";
        }

        if (false == is_null($this->next)) {
            $this->next->message($msg, $priority);
        }
    }
}