<?php
namespace DesignPattern\CreationalPatterns\FactoryMethod;

interface CarInterface
{
    //定义了Car的接口，每种Car必须要实现getType()方法以获取其类型
    public function getType();
}
