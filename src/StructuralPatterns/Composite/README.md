# 组合模式 Composite

组合模式的目的是为了将对象**组合**成一个树形结构以表现**部分/整体**的层次结构。实现组合模式能够统一地处理单个组件与整个组合体。

## 使用

例如**表单**组件中可以插入多个子组件：**输入框**与**文本框**，同时在表单组件中的任何位置右可以插入其他的表单组件，这样多个子组件就能够以组合模式构成一个大的树形表单组件

## 代码实现

子组件都必须实现同样的接口，这里是都必须有`render()`方法，以为不同的表单组件渲染出不同的 html 格式

```php
interface RenderableInterface
{
    public function render();
}
```

form 组件能够在其中添加子组件

```php
class Form implements RenderableInterface
{
    private $elements;

    public function render()
    {
        $formCode = '<form>';

        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        $formCode .= '</form>';

        return $formCode;
    }

    public function addElement(RenderableInterface $element)
    {
        $this->elements[] = $element;
    }
}
```

Input 与 Text 子组件则是最小的子组件，不能向其中添加功能

```php
class InputElement implements RenderableInterface
{
    public function render() : string
    {
        return '<input type="text" />';
    }
}
```

```php
class TextElement implements RenderableInterface
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render() : string
    {
        return $this->text;
    }
}
```

## 测试

```php
//新建树结构的根节点
$form = new Form();
//向form节点中插入子组件
$form->addElement(new TextElement('Email:'));
$form->addElement(new InputElement());
$embed = new Form();
$embed->addElement(new TextElement('Password:'));
$embed->addElement(new InputElement());
$form->addElement($embed);

echo $form->render();
```

输出：

```
<form>Email:<input type="text" /><form>Password:<input type="text" /></form></form>
```
