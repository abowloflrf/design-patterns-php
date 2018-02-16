<?php
namespace DesignPattern\BehavioralPatterns\ChainOfResponsibility;

abstract class Logger
{
	//使用数字定义不同的错误级别
	const ERR = 3;
	const NOTICE = 5;
	const DEBUG = 7;

	//用于构造Logger的优先级参数
	protected $mask;
	//next用于定义责任链先后关系
	protected $next;
	//设置责任链先后关系的方法
	public function setNext(Logger $l)
	{
		$this->next = $l;
		return $this;
	}
	//处理消息的方法
	abstract public function message($msg, $priority);
}
