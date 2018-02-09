# 外观模式 Facade

外观模式为系统中的多个组件向外提供了一个一致的**门面 Facade**，它定义了一个高层的接口使得要调用子系统的功能可以统一通过这个门面进行调用，这样用户在使用功能时只需要与门面进行交互而不用考虑多个子组件的关系，降低了系统的耦合度。

## 代码实现
这里实现一个`CompuserveFacade`来组合一台计算机的多个部件：`CPU`、`RAM`、`HardDrive`，这些组件分别有各自的功能，通过Facade组合到一起后，便可以只通过Facade来执行这些组件的功能了。

计算机的三个组件

```php
class CPU
{
    public function excute($command)
    {
        echo "CPU is excuting $command...\n";
    }
}

class RAM
{
    public function read($addr)
    {
        echo "RAM is reading from $addr...\n";
    }
    public function write($addr)
    {
        echo "RAM is writing to $addr...\n";
    }
}

class HardDrive
{
    public function read($addr)
    {
        echo "HD is reading from $addr...\n";
    }
    public function write($addr)
    {
        echo "HD is writing to $addr...\n";
    }
}
```

通过`ComputerFacade`组合

```php
class ComputerFacade
{
    protected $ram;
    protected $cpu;
    protected $hd;

    public function __construct(CPU $cpu, RAM $ram, HardDrive $hd)
    {
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->hd = $hd;
    }

    public function run()
    {
        $this->ram->read("0x0000");
        $this->ram->write("0x1000");
        $this->cpu->excute("boom");
        $this->hd->read("0x2000");
        $this->hd->write("0x3000");
    }
}
```

## 测试

```php
$cpu = new CPU;
$ram = new RAM;
$hd = new HardDrive;
$pc = new ComputerFacade($cpu, $ram, $hd);

$pc->run();
```

输出

```
RAM is reading from 0x0000...
RAM is writing to 0x1000...
CPU is excuting boom...
HD is reading from 0x2000...
HD is writing to 0x3000...
```

