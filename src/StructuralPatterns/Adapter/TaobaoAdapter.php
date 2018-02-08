<?php
namespace DesignPattern\StructuralPatterns\Adapter;

class TaobaoAdapter implements BuybuybuyAdapterInterface
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