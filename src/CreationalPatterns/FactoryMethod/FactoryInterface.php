<?php
namespace DesignPattern\CreationalPatterns\FactoryMethod;

interface FactoryInterface
{
    //定义工厂接口的produce方法用于实例化类
    public function produce();
}