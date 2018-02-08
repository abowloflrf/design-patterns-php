<?php
namespace DesignPattern\StructuralPatterns\Bridge;

class DrawingAPI1 implements DrawingAPI
{
    public function drawCircle($x, $y, $radius)
    {
        echo "API1.circle at $x:$y radius $radius.\n";
    }
}