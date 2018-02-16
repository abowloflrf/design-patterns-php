# 责任链模式 Chain-of-responsibility

责任链模式用于处理传递过来的请求，模式将用于处理不同类型请求的不同类型处理对象构建成一个责任链，不同的处理方法有特定的先后顺序，当请求传递过来时，从某一个处理方法开始处理，在方法内部检查这个请求是否适合这个处理对象去处理，若不适合，则将这个请求传递给下一个处理对象，这样一来形成一条责任链，使得多个对象都有机会处理每个传过来的请求，解决了发送请求与处理请求对象之间的耦合关系。

## 代码实现

实例中构建一个用于处理日志信息的责任链，有记录日志的请求传递过来时，经过责任链的每一个 logger handler，它们根据日志的错误等级决定自己是否应该处理这个信息，将这个请求沿着这条责任链传递下去。

定义抽象的 logger handler，每个日志处理对象内有属性 mask 用于记录自己能够处理怎样的日志，next 用于记录责任链自己的下一个处理程序，setnext 方法用于在构建责任链时设定责任链的先后关系，message 方法为处理日志的具体实现。

```php
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
```

标准错误输出 `StderrLogger`

```php
class StderrLogger extends Logger
{
    public function __construct($mask)
    {
        $this->mask = $mask;
    }

    public function message($msg, $priority)
    {
        if ($priority <= $this->mask) {
            echo "Writing to stderr: {$msg}\n";
        }

        if (false == is_null($this->next)) {
            $this->next->message($msg, $priority);
        }
    }
}
```

## 测试

```php
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
```

输出：

```
Writing to debug output: Entering function y.
Writing to debug output: Step1 completed.
Sending via email: Step1 completed.
Writing to debug output: An error has occurred.
Sending via email: An error has occurred.
Writing to stderr: An error has occurred.
```