<?php
namespace DesignPattern\StructuralPatterns\Proxy;

class ProxyImage implements ImageInterface
{
    private $file;
    private $image;
    public function __construct($fileName)
    {
        $this->file = $fileName;
    }
    public function display()
    {
        if ($this->image == null) {
            $this->image = new RealImage($this->file);
        }
        $this->image->display();
    }
}