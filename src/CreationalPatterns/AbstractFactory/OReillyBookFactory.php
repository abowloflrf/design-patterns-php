<?php
namespace DesignPattern\CreationalPatterns\AbstractFactory;

use DesignPattern\CreationalPatterns\AbstractFactory\OReillyPHPBook;
use DesignPattern\CreationalPatterns\AbstractFactory\OReillyMySQLBook;

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