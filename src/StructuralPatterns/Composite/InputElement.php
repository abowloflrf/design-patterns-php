<?php
namespace DesignPattern\StructuralPatterns\Composite;

class InputElement implements RenderableInterface
{
    public function render() : string
    {
        return '<input type="text" />';
    }
}