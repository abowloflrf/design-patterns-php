<?php
namespace DesignPattern\CreationalPatterns\Builder;

class HTMLPage
{
    private $page = null;
    private $page_title = null;
    private $page_heading = null;
    private $page_text = null;

    function showPage()
    {
        return $this->page;
    }
    function setTitle($title_in)
    {
        $this->page_title = $title_in;
    }
    function setHeading($heading_in)
    {
        $this->page_heading = $heading_in;
    }
    function setText($text_in)
    {
        $this->page_text .= $text_in;
    }
    function formatPage()
    {
        $this->page = "<html>\n";
        $this->page .= "<head><title>" . $this->page_title . "</title></head>\n";
        $this->page .= "<body>\n";
        $this->page .= "<h1>" . $this->page_heading . "</h1>\n";
        $this->page .= $this->page_text . "\n";
        $this->page .= "</body>\n";
        $this->page .= "</html>\n";
    }
}