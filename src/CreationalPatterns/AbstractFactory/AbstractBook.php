<?php
namespace DesignPattern\CreationalPatterns\AbstractFactory;

abstract class AbstractBook
{
    abstract public function getAuthor();
    abstract public function getTitle();
}