<?php
namespace DesignPattern\StructuralPatterns\Bridge;

class DrawingAPI2 implements DrawingAPI
{
    public function drawCircle($x, $y, $radius)
    {
        echo "API2.circle at $x:$y radius $radius.\n";
    }
}