<?php
namespace DesignPattern\CreationalPatterns\Prototype;

abstract class BookPrototype
{
    protected $title;
    protected $topic;

    //必须有__clone()方法
    abstract public function __clone();

    function getTitle()
    {
        return $this->title;
    }

    function setTitle($titleIn)
    {
        $this->title = $titleIn;
    }

    function getTopic()
    {
        return $this->topic;
    }
    
}