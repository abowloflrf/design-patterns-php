<?php
namespace DesignPattern\StructuralPatterns\Proxy;

class RealImage implements ImageInterface
{
    private $file;
    public function __construct($fileName)
    {
        $this->file = $fileName;
    }
    public function display()
    {
        echo "Displaying: " . $this->file . "\n";
    }
}