<?php
namespace DesignPattern\StructuralPatterns\Proxy;

class Test
{
    public function run()
    {
        $image=new ProxyImage("dog.jpg");
        $image->display();
    }
}