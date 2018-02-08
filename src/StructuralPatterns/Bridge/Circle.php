<?php
namespace DesignPattern\StructuralPatterns\Bridge;

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