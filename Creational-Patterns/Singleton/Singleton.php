<?php
namespace DesignPattern\CreationalPatterns;

class Singleton
{
    //构造函数设置为private，不允许在外部实例化此对象
    private function __construct()
    {
    }

    //__clone()方法设置为私有，不允许使用clone来复制对象
    private function __clone()
    {
    }
    //使用getInstance()获取单例
    static public function getInstance()
    {
        static $obj = null;
        if ($obj === null) {
            $obj = new self();
        }
        return $obj;
    }
    //单例类中的一个方法
    public function test()
    {
        echo "done\n";
    }
}