<?php
namespace DesignPattern\StructuralPatterns\Adapter;

class Test
{
    public function run()
    {
        //1000元余额的支付宝账户
        $aliAccount=new Alipay(1000);
        $taobaoBuy=new TaobaoAdapter($aliAccount);
        $taobaoBuy->pay(600);
        $tmallBuy=new TmallAdapter($aliAccount);
        $tmallBuy->pay(300);
        $tmallBuy->pay(500);
    }
}