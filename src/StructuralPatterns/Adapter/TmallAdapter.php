<?php
namespace DesignPattern\StructuralPatterns\Adapter;

class TmallAdapter implements BuybuybuyAadpterInterface
{
    private $alipay;

    public function __construct(Alipay $alipay)
    {
        $this->alipay = $alipay;
    }

    public function pay($amount)
    {
        $this->alipay->sendPayment($amount);
    }
}