<?php
namespace DesignPattern\StructuralPatterns\Decorator;

class Test
{
    public function run()
    {
        $webservice = new WebService(array(
            "foo" => "bar"
        ));

        var_dump($webservice->renderData());

        $xml = new RenderInXML($webservice);
        echo "XML: \n";
        echo $xml->renderData() . "\n";

        $json = new RenderInJSON($webservice);
        echo "JSON: \n";
        echo $json->renderData() . "\n";
    }
}