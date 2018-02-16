<?php
namespace DesignPattern\BehavioralPatterns\ChainOfResponsibility;

class Test
{
    public function run()
    {
        //先构建责任链，实例化链中的不同Logger
        $l = new DebugLogger(Logger::DEBUG);
        $e = new EmailLogger(Logger::NOTICE);
        $s = new StderrLogger(Logger::ERR);
		//设定责任链的先后处理关系 DebugLogger->EmailLogger->StderrLogger
        $e->setNext($s);
        $l->setNext($e);
        //从责任链的头部DebugLogger开始处理不同的错误
        $l->message("Entering function y.", Logger::DEBUG);		// handled by DebugLogger
        $l->message("Step1 completed.", Logger::NOTICE);	// handled by DebugLogger and EmailLogger
        $l->message("An error has occurred.", Logger::ERR);		// handled by all three Loggers
    }
}