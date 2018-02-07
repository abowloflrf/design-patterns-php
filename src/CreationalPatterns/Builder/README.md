# 建造者模式 Builder

建造者模式是一种**对象构建**模式，它可以将复杂的对象的构建过程一步步抽象出来，使得复杂对象的每一个部分的构建接口对外暴露，每一个构建过程通过传入不同的参数最终构建不同的对象。

## 使用情景

* 当创建复杂对象的算法应该独立于该对象的组成部分以及它们的装配方式时
* 当构造过程必须允许被构造的对象有不同的表示时

## 建造者模式的构成部分

### Director

构造一个使用 Builder 接口的对象

### Builder

抽象构建者，为创建一个 Product 对象的各个部件指定抽象接口

### ConcreteBuilder

具体的建造者，实现了 Builder 的接口以构造装配产品的各个部件

### Product

使用建造者模式所构建出来的复杂对象

## 代码实现

在例子中我用于构建一个 HTML 页面，这个 HTML 页面包含有这些内容：

* Title
* Heading
* 正文

通过一个 HTMLPageBuilder 来构建整个内容，首先不关心如何实现这些类，先看最后我编写测试代码用于执行这个 Builder

```php
$pageBuilder=new HTMLPageBuilder();
$pageDirector=new Director($pageBuilder);
$pageDirector->buildPage();
$page=$pageDirector->getPage();
echo $page->showPage();
```

首先实例化一个 HTMLPageBuilder，其中有用于构建这个文档各个部分的 setter 方法，实际上是去调用 HTMLPage 类的 setter 方法来一步步构建这个 HTMLPage 对象。

```php
class HTMLPageBuilder implements PageBuilder
{
    private $page = null;
    function __construct()
    {
        $this->page = new HTMLPage();
    }
    function setTitle($title_in)
    {
        $this->page->setTitle($title_in);
    }
    function setHeading($heading_in)
    {
        $this->page->setHeading($heading_in);
    }
    function setText($text_in)
    {
        $this->page->setText($text_in);
    }
    function formatPage()
    {
        $this->page->formatPage();
    }
    function getPage()
    {
        return $this->page;
    }
}
```

但是这个 builder 本身并没有去真正的构建实例，而是通过**Director**：将实例化的 builder 作为参数传递到 Director 的构造函数，构造了一个 Director 的实例，然后 director 实例调用其中的`buildPage`方法将 HTML 文档的各个部分内容分别传入 builder 聚合在一起形成了一个完整的 HTML 文档。

```php
class Director
{
    private $builder = null;

    public function __construct(PageBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildPage()
    {
        $this->builder->setTitle('Testing the HTMLPage');
        $this->builder->setHeading('Testing the HTMLPage');
        $this->builder->setText('Testing, testing, testing!');
        $this->builder->formatPage();
    }

    public function getPage()
    {
        return $this->builder->getPage();
    }
}
```

`HTMLPage.php`

```php
class HTMLPage
{
    private $page = null;
    private $page_title = null;
    private $page_heading = null;
    private $page_text = null;

    function showPage()
    {
        return $this->page;
    }
    function setTitle($title_in)
    {
        $this->page_title = $title_in;
    }
    function setHeading($heading_in)
    {
        $this->page_heading = $heading_in;
    }
    function setText($text_in)
    {
        $this->page_text .= $text_in;
    }
    function formatPage()
    {
        $this->page = "<html>\n";
        $this->page .= "<head><title>" . $this->page_title . "</title></head>\n";
        $this->page .= "<body>\n";
        $this->page .= "<h1>" . $this->page_heading . "</h1>\n";
        $this->page .= $this->page_text . "\n";
        $this->page .= "</body>\n";
        $this->page .= "</html>\n";
    }
}
```
