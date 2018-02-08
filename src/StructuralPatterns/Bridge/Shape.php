<?php
namespace DesignPattern\StructuralPatterns\Bridge;

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