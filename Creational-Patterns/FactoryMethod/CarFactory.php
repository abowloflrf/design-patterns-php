<?php
namespace DesignPattern\CreationalPatterns;

require_once('FactoryInterface.php');
class CarFactory implements Factory
{
    //CarFactory类实现了Factory结构中的produce方法生产实例化Car
    public function produce($type = '')
    {
        switch ($type) {
            case 'A':
                return new CarA();
                break;
            case 'B':
                return new CarB();
                break;
            default:
                echo "Type not support\n";
                break;
        }
    }
}
