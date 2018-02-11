<?php
namespace DesignPattern\StructuralPatterns\Flyweight;

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