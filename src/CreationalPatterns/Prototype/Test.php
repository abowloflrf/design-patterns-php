<?php
namespace DesignPattern\CreationalPatterns\Prototype;

class Test
{
    public function run()
    {
        $phpProto=new PHPBookPrototype();
        $mysqlProto=new MySQLBookPrototype();

        $phpBook1=clone $phpProto;
        $phpBook1->setTitle("PHP Book 1");
        $phpBook2=clone $phpProto;
        $phpBook2->setTitle("PHP Book 2");

        $mysqlBook1=clone $mysqlProto;
        $mysqlBook1->setTitle("MySQL Book 2");

        echo $phpBook1->getTitle()."\n";
        echo $phpBook2->getTitle()."\n";
        echo $mysqlBook1->getTitle()."\n";
    }
}