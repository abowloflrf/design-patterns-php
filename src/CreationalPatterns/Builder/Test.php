<?php
namespace DesignPattern\CreationalPatterns\Builder;

class Test{
    public function run(){
        $pageBuilder=new HTMLPageBuilder();
        $pageDirector=new Director($pageBuilder);
        $pageDirector->buildPage();
        $page=$pageDirector->getPage();
        echo $page->showPage();
    }
}