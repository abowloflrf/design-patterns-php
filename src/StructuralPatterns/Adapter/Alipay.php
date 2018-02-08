<?php
namespace DesignPattern\StructuralPatterns\Adapter;

class Alipay
{

    private $deposit;
    public function __construct($money)
    {
        $this->deposit = $money;
    }

    public function sendPayment($amount)
    {
        if ($this->deposit < $amount) {
            echo "Can't buy anymore! You don't have enough money!\n";
        } else {
            $this->deposit -= $amount;
            echo "Pay ￥" . $amount . " via Alipay\n";
            echo "Deposit: ￥" . $this->deposit . "\n";
        }
    }
}