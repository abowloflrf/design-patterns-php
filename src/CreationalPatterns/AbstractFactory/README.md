# 抽象工厂模式 Abstract Factory

抽象工厂模式是提供了一种**工厂的抽象**，将具有相同或类似功能的工厂封装起来，工厂抽象只定义了工厂的方法，在需要使用某种具体的工厂时在创建抽象工厂的具体实现，然后使用具体的工厂来创建属于这一类别的具体对象产品。

## 定义

抽象工厂模式的实质是“**提供接口，创建一系列相关或独立的对象，而不指定这些对象的具体类。**”

## 代码实现

在例子中有一个抽象图书工厂`AbstractBookFactory`，它定义了两个工厂方法，分别可以生产 PHP 图书，和 MySQL 图书，实现具体抽象工厂相当于实现了不同的出版社，我们将其定义为 OReilly 与 Sams 两家出版社，类名为`OReillyBooKFactory`与`SamsBooKFactory`，都实现了上面的抽象工厂，具体生产怎样的图书也是在具体的工厂中详细实现，即由不同的出版社决定

```php
abstract class AbstractBookFactory
{
    abstract public function publishPHPBook($author, $title);
    abstract public function publishMySQLBook($author, $title);
}
```

```php
class OReillyBookFactory extends AbstractBookFactory
{
    private $publisher = "OReilly";
    public function publishMySQLBook($author = "Unknown", $title = "Untitled")
    {
        return new OReillyMySQLBook($author, $title);
    }
    public function publishPHPBook($author = "Unknown", $title = "Untitled")
    {
        return new OReillyPHPBook($author, $title);
    }
}
```

**书**是工厂生产的对象，这个对象是具体的类，而不能是抽象类。不同的出版社，不同类别的图书，都是不同的具体的图书类。由于我们的抽象工厂能够生产两种不同的书籍，PHP 与 MySQL，所以这里定义两个图书的抽象类`AbstractPHPBook`与`AbstractPHPBook`，不同类别的抽象图书类都有不同的`subject`属性，同时我们又让这两个抽象图书类都继承与同一个图书类`AbstractBook`，因为不管是怎样的图书，它们都必定有`getAuthor`和`getTitle`两个方法，这个是不同类别的书籍都必须要有的方法。

`AbstractBook.php`

```php
abstract class AbstractBook
{
    abstract public function getAuthor();
    abstract public function getTitle();
}
```

`AbstractPHPBook`

```php
abstract class AbstractPHPBook extends AbstractBook{
    private $subject="PHP";
}
```

这里是真正要生产的图书类

```php
class OReillyPHPBook extends AbstractPHPBook
{
    private $author;
    private $title;
    function __construct($author, $title)
    {
        $this->author = $author;
        $this->title = $title;
    }
    function getAuthor()
    {
        return $this->author;
    }
    function getTitle()
    {
        return $this->title;
    }
}
```

## 测试

使用抽象工厂类，首先实例化指定的工厂，在具体的实例化工厂下调用其生产图书的方法，得到具体的图书实例，因此我们在创建对象时，不需要指定具体的类是哪一个，只要使用相应的用于创建对象的工厂并调用工厂的生产方法即可返回需要的具体产品

```php
//实例化一个OReilly图书工厂
$OReillyFactoryInstance = new OReillyBookFactory;
//OReilly图书工厂出版一本PHP书籍
$book1 = $OReillyFactoryInstance->publishPHPBook("Author A", "PHP Book1 from O");
echo $book1->getAuthor() . "\n";
echo $book1->getTitle() . "\n";
$SamsFactoryInstance = new SamsBookFactory;
$book2 = $SamsFactoryInstance->publishMySQLBook("Author B", "MySQL Book from S");
echo $book2->getAuthor() . "\n";
echo $book2->getTitle() . "\n";
$book3 = $SamsFactoryInstance->publishPHPBook("Author C", "PHP Book from S");
echo $book3->getAuthor() . "\n";
echo $book3->getTitle() . "\n";
```
