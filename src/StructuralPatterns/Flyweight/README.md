# 享元模式 Flyweight

使用共享物件，尽可能减少内存使用量以分享更多的内容给**相似的组件**。

## 使用情景

享元模式适用于大量组件重复而导致占用了大量内存。这时组件中的大部分内容都是重复的，这些重复的内容可以共享给其他的相似组件。常见的做法是把他们放在外部数据结构，需要时传递给**享元**

例如在文本编辑器中以图形结构来表示字符，但是每个字符有其外观字重等等信息，这使得每个字符都会占用大量空间。取而代之的是，使用享元模式，每个字符传递到一个共享的字符组件，这个组件被所有其他字符所共享，这样只有每个**字符**本色内容才会被额外的储存。

## 代码实现

享元接口，指定了render方法用于渲染字符

```php
interface FlyweightInterface
{
    public function render(string $extrinsicState);
}
```

具体的享元类，实现了具体如何去使用给定的字符内容与字体来渲染字符

```php
class CharacterFlyweight implements FlyweightInterface
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function render($font)
    {
        return sprintf('Character %s with font %s', $this->name, $font);
    }
}
```

使用工厂来生产享元类

```php
class FlyweightFactory implements \Countable
{
    private $pool = [];
    public function get($name)
    {
        if (!isset($this->pool[$name])) {
            $this->pool[$name] = new CharacterFlyweight($name);
            return $this->pool[$name];
        }
    }
    public function count()
    {
        return count($this->pool);
    }
}
```

## 测试

如测试代码中，将所有的字符与可能的自体单独储存在另外的数据结构中，在需要是使用工厂来生产享元类以渲染指定的字符

```php
class Test
{
    private $characters = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
        'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
        'w', 'x', 'y', 'z'
    ];

    private $fonts = ['Arial', 'Times New Roman', 'Verdana', 'Helvetica'];

    public function run()
    {
        $factory = new FlyweightFactory();
        $flyweight = $factory->get($this->characters[0]);
        $rendered = $flyweight->render($this->fonts[1]);
        var_dump($rendered);
    }
}
```

输出

```php
string(38) "Character a with font Times New Roman"
```