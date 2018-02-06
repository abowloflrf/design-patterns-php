<?php
namespace DesignPattern\CreationalPatterns\Singleton;

class Test
{
    public function rou()
    {
        $instance = Singleton::getInstance();
        $instance->test();

        $instance2 = Singleton::getInstance();
        if ($instance === $instance2) {
            echo "same instance";
        }
    
        //使用clone会提示出错，因为__clone()被设置为私有
        //$newInstance=clone $instance;
        
        //使用new实例化一个对象也被禁止，因为__construct()构造函数被设置为私有
        //$newInstance=new Singleton();
    }

}
