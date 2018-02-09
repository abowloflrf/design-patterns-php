<?php
namespace DesignPattern\StructuralPatterns\Decorator;

class RenderInJSON extends Decorator
{
    public function renderData()
    {
        $output = $this->wrapped->renderData();

        return json_encode($output);
    }
}