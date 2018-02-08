# 桥接模式

桥接模式的目的可以用一句话概括：解耦一个对象的**实现**以及其**抽象**，使两者可以独立变化。

实现与抽象解耦之后，两者可以分别定义其接口，分别独立地进行改进、扩展等等，不会相互影响。

## 代码实现

在桥接模式的实现例子中，我使用不同的**画笔**去画**图形**，即有 DrawingAPI 接口中定义了 drawCircle 方法去实现：

```php
interface DrawingAPI
{
    function drawCircle($x, $y, $radius);
}
```

具体有两个 API 实现了这个接口：

```php
class DrawingAPI1 implements DrawingAPI
{
    public function drawCircle($x, $y, $radius)
    {
        echo "API1.circle at $x:$y radius $radius.\n";
    }
}
```

要作出的画是 Circle，Circle 继承与 Shape，这个 Shape 即为对象的**抽象**：

```php
abstract class Shape
{
    protected $drawingAPI;
    public abstract function draw();
    public abstract function resizeByPercentage($pct);
    protected function __construct(DrawingAPI $drawingAPI)
    {
        $this->drawingAPI = $drawingAPI;
    }
}
```

`Circle`类继承了这一 Shape 抽象：

```php
class Circle extends Shape
{
    private $x;
    private $y;
    private $radius;

    public function __construct($x, $y, $radius, DrawingAPI $drawingAPI)
    {
        parent::__construct($drawingAPI);
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function draw()
    {
        $this->drawingAPI->drawCircle($this->x, $this->y, $this->radius);
    }

    public function resizeByPercentage($pct)
    {
        $this->radius *= $pct;
    }
}
```

## 测试

本例中的桥梁相当于是`Circle`类，其构造函数中需要有`DrawingAPI`接口，即其需要有这些实现，但是不指定具体是哪些实现了这些方法的类，同时`Circle`类是继承于`Shape`的，因此它也连接了对象的抽象去实现了抽象中定义的需要实现的方法`resizeByPercentage`

```php
$circle_a = new Circle(1, 3, 7, new DrawingAPI1());
$circle_b = new Circle(5, 7, 11, new DrawingAPI2());

$circle_a->resizeByPercentage(2.5);
$circle_a->draw();

$circle_b->resizeByPercentage(3.5);
$circle_b->draw();
```

输出

```
API1.circle at 1:3 radius 17.5.
API2.circle at 5:7 radius 38.5.
```
