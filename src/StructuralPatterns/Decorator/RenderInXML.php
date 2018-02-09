<?php
namespace DesignPattern\StructuralPatterns\Decorator;

class RenderInXML extends Decorator
{
    public function renderData()
    {
        $output = $this->wrapped->renderData();

        $doc = new \DOMDocument();

        foreach ($output as $key => $val) {
            $doc->appendChild($doc->createElement($key, $val));
        }

        return $doc->saveXML();
    }
}