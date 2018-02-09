# 装饰器模式 Decorator

使用装饰器模式的目的是动态地向一个类中添加功能，它是类继承的另一种选择，类继承是在编译时就增加行为，即将原本的类扩展成一个更加复杂的子类。但是使用装饰器模式只需要在运行时使用一个**装饰器类**将原有的类**包裹**，即将原类作为装饰器类的构造函数参数。同时在使用装饰器类使用型的扩展方法的同时，由于装饰器类也实现了原有类的接口，因此也可以直接调用原有类的方法。

## 使用

例如有一个 WebService 类实现了 RendererInterface 接口，这个接口要求能够返回一些数据，方法为`renderData`。这时我们需要为它新增加两个多的数据返回格式，json 与 xml 格式。那么可以编写一个也实现了 RendererInterface 接口的装饰器类**Decorator**，然后将两个功能分别写入型的具体装饰类中：RenderInXML 与 RenderInJSON 中。那么在需要返回新的数据类型时就可以实例化指定功能的装饰器，将原 WebService 实例传入构造，并可以在装饰器中调用相应的方法返回新的数据类型了。

## 代码实现

需要返回数据的功能

```php
interface RendererInterface
{
    public function renderData();
}
```

实现了这个功能的 WebService 但是它只能返回原数据，没有其他修饰功能

```php
class WebService implements RendererInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function renderData()
    {
        return $this->data;
    }
}
```

这时新建一个装饰器类，将原对象包裹即作为构造函数的参数加入

```php
abstract class Decorator implements RendererInterface
{
    protected $wrapped;

    public function __construct(RendererInterface $wrapper)
    {
        $this->wrapped = $wrapper;
    }
}
```

那么我们就可以通过继承这个抽象的装饰器来新增不同的功能，**为返回的数据做一点装饰**

```php
class RenderInXML extends Decorator
{
    public function renderData()
    {
        $output = $this->wrapped->renderData();

        $doc = new \DOMDocument();

        foreach ($output as $key => $val) {
            $doc->appendChild($doc->createElement($key, $val));
        }

        return $doc->saveXML();
    }
}
```

## 测试

```php
$webservice = new WebService(array(
    "foo" => "bar"
));

//原功能只能输出原始数据
var_dump($webservice->renderData());
//使用xml装饰器输出xml格式的数据
$xml = new RenderInXML($webservice);
echo "XML: \n";
echo $xml->renderData() . "\n";
//使用json装饰器输出json格式的数据
$json = new RenderInJSON($webservice);
echo "JSON: \n";
echo $json->renderData() . "\n";
```

输出结果

```
array(1) {
  'foo' =>
  string(3) "bar"
}

XML:
<?xml version="1.0"?>
<foo>bar</foo>

JSON:
{"foo":"bar"}
```
