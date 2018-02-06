# 单例模式 Singleton

单例模式的类是为了保证这个类**只能够有一个实例存在**

## 实现思路

单例模式的类有一个获得该对象实例的方法`getInstance()`，这个方法必须是静态方法，因为我们要禁止在外部使用构造函数实例化这个类，因此可以将构造函数定义为私有，这样外部就只能够通过该类提供的静态方法`getInstance()`来得到这个类的唯一实例

## 代码实现

这里使用 php 来实现一个单例模式，在类中，我们除了将构造函数设置为私有外，还将类的魔术方法`__clone()`也设置为私有，方式在外部使用`clone`来复制实例

```php
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
```

## 测试

```php
$instance = Singleton::getInstance();
$instance->test();

//再次调用相比较发现两者是引用的同一个实例
$instance2 = Singleton::getInstance();
if ($instance === $instance2) {
    echo "same instance";
}

//使用clone会提示出错，因为__clone()被设置为私有
//$newInstance=clone $instance;

//使用new实例化一个对象也被禁止，因为__construct()构造函数被设置为私有
//$newInstance=new Singleton();
```
