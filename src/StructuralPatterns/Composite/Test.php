<?php
namespace DesignPattern\StructuralPatterns\Composite;

class Test
{
    public function run()
    {
        $form = new Form();
        $form->addElement(new TextElement('Email:'));
        $form->addElement(new InputElement());
        
        $embed = new Form();
        $embed->addElement(new TextElement('Password:'));
        $embed->addElement(new InputElement());
        $form->addElement($embed);

        echo $form->render();
    }
}