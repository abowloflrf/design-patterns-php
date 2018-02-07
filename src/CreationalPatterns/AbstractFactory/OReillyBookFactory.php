<?php
namespace DesignPattern\CreationalPatterns\AbstractFactory;

class OReillyBookFactory extends AbstractBookFactory
{
    private $publisher = "OReilly";
    public function publishMySQLBook($author = "Unknown", $title = "Untitled")
    {
        return new OReillyMySQLBook($author, $title);
    }
    public function publishPHPBook($author = "Unknown", $title = "Untitled")
    {
        return new OReillyPHPBook($author, $title);
    }
}