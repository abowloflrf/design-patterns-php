<?php
namespace DesignPattern\CreationalPatterns\AbstractFactory;

class SamsBookFactory extends AbstractBookFactory
{
    private $publisher = "Sams";
    public function publishMySQLBook($author = "Unknown", $title = "Untitled")
    {
        return new SamsMySQLBook($author, $title);
    }
    public function publishPHPBook($author = "Unknown", $title = "Untitled")
    {
        return new SamsPHPBook($author, $title);
    }
}