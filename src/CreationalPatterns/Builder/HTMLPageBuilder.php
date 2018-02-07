<?php
namespace DesignPattern\CreationalPatterns\Builder;

class HTMLPageBuilder implements PageBuilder
{
    private $page = null;
    function __construct()
    {
        $this->page = new HTMLPage();
    }
    function setTitle($title_in)
    {
        $this->page->setTitle($title_in);
    }
    function setHeading($heading_in)
    {
        $this->page->setHeading($heading_in);
    }
    function setText($text_in)
    {
        $this->page->setText($text_in);
    }
    function formatPage()
    {
        $this->page->formatPage();
    }
    function getPage()
    {
        return $this->page;
    }
}
