<?php
namespace DesignPattern\StructuralPatterns\Decorator;

abstract class Decorator implements RendererInterface
{
    protected $wrapped;

    public function __construct(RendererInterface $wrapper)
    {
        $this->wrapped = $wrapper;
    }
}