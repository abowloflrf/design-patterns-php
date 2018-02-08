<?php
namespace DesignPattern\StructuralPatterns\Bridge;

class Test
{
    public function run()
    {
        $circle_a = new Circle(1, 3, 7, new DrawingAPI1());
        $circle_b = new Circle(5, 7, 11, new DrawingAPI2());

        $circle_a->resizeByPercentage(2.5);
        $circle_a->draw();

        $circle_b->resizeByPercentage(3.5);
        $circle_b->draw();
    }
}