<?php
namespace DesignPattern\CreationalPatterns\AbstractFactory;

class Test
{
    public function run()
    {
        //实例化一个OReilly图书工厂
        $OReillyFactoryInstance = new OReillyBookFactory;
        //OReilly图书工厂出版一本PHP书籍
        $book1 = $OReillyFactoryInstance->publishPHPBook("Author A", "PHP Book1 from O");
        echo $book1->getAuthor() . "\n";
        echo $book1->getTitle() . "\n";
        $SamsFactoryInstance = new SamsBookFactory;
        $book2 = $SamsFactoryInstance->publishMySQLBook("Author B", "MySQL Book from S");
        echo $book2->getAuthor() . "\n";
        echo $book2->getTitle() . "\n";
        $book3 = $SamsFactoryInstance->publishPHPBook("Author C", "PHP Book from S");
        echo $book3->getAuthor() . "\n";
        echo $book3->getTitle() . "\n";
    }
}