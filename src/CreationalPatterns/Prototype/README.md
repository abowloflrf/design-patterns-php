# 原型模式 Prototype

通过**复制**一个已经存在的实例来创建新的实例，而不是构造新的实例。这一过程中被复制的实例被称为**原型 Prototype**

## 使用情景

原型模式多用于创建复杂或耗时的实例，这种情形，直接对一个已经存在的实例进行复制会更加高效。或者要创建许多个相似的实例时。

## 代码实现

在实现原型模式的代码中，我编写了一个`BookPrototype`的抽象类，类中具有属性`topic`与`title`，抽象类中定义了抽象方法`__clone()`，这个魔术方法其实内部不需要多实现什么，只需要定义在抽象类中，以让继承这个抽象类能够得以使用`clone`语句来对对象的实例进行赋值操作，以达到我们原型模式**复制原型**的目的。

`BookPrototype.php`

```php
<?php
namespace DesignPattern\CreationalPatterns\Prototype;

abstract class BookPrototype
{
    protected $title;
    protected $topic;

    //必须有__clone()方法
    abstract public function __clone();

    function getTitle()
    {
        return $this->title;
    }

    function setTitle($titleIn)
    {
        $this->title = $titleIn;
    }

    function getTopic()
    {
        return $this->topic;
    }

}
```

这个抽象类中属性`title`有其 setter 和 getter，但是属性`topic`只有一个 getter，因为后面我们还需要定义继承这个抽象类的不同类型的图书原型，我定义了两个，分别为`PHPBookPrototype`与`MySQLBookPrototype`，在编写这两个具体类别的原型类时，属性`topic`的 setter 在它们中指定自己的类别。

`PHPBookPrototype.php`

```php
<?php
namespace DesignPattern\CreationalPatterns\Prototype;

class PHPBookPrototype extends BookPrototype
{
    function __construct()
    {
        $this->topic = 'PHP';
    }
    function __clone()
    {
    }
}
```

## 测试

在使用原型方法时，我们只需要实例化一个指定的原型类作为复制对象，后面需要定义具体的类时对这个原型进行**复制**操作即可，但是注意到这里我指定类别的 Book 原型是没有设置标题的，只有 topic 属性在原型中已经被初始化，因此在复制后需要调用实例 title 属性的 setter 方法以为图书命名。

```php
<?php
namespace DesignPattern\CreationalPatterns\Prototype;

class Test
{
    public function run()
    {
        $phpProto=new PHPBookPrototype();
        $mysqlProto=new MySQLBookPrototype();

        $phpBook1=clone $phpProto;
        $phpBook1->setTitle("PHP Book 1");
        $phpBook2=clone $phpProto;
        $phpBook2->setTitle("PHP Book 2");

        $mysqlBook1=clone $mysqlProto;
        $mysqlBook1->setTitle("MySQL Book 2");

        echo $phpBook1->getTitle()."\n";
        echo $phpBook2->getTitle()."\n";
        echo $mysqlBook1->getTitle()."\n";
    }
}
```
