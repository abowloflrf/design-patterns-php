<?php
namespace DesignPattern\CreationalPatterns\AbstractFactory;

abstract class AbstractBookFactory
{
    abstract public function publishPHPBook($author, $title);
    abstract public function publishMySQLBook($author, $title);
}
