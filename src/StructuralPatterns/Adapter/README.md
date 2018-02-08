# 适配器模式 Adapter

适配器模式的目的是将一个类的接口转换成所期待的使用的，即将不能直接使用的接口转换成相互兼容的接口以便使用

## 代码实现

假设我们有一个支付宝账号，支付宝账号有一个`sendPayment`接口用于付款，但是我们需要使用支付宝在不同的平台上进行购物，例如，淘宝和天猫两个购物平台都是使用支付宝进行支付的，这样我们就可以分别为淘宝和天猫平台编写用于适配支付宝的支付接口的两个适配器，`TaobaoAdapter`和`TmallAdapter`，它们都有有一个共同的方法就是`pay`用于付款，因此我们让它们都实现一个用于购物的接口`BuybuybuyAdapterInterface`，使他们必须实现这个 pay 方法

`Alipay.php`

```php
class Alipay
{

    private $deposit;
    public function __construct($money)
    {
        $this->deposit = $money;
    }

    public function sendPayment($amount)
    {
        if ($this->deposit < $amount) {
            echo "Can't buy anymore! You don't have enough money!\n";
        } else {
            $this->deposit -= $amount;
            echo "Pay ￥" . $amount . " via Alipay\n";
            echo "Deposit: ￥" . $this->deposit . "\n";
        }
    }
}
```

`BuybuybuyAdapterInterface.php`

```php
interface BuybuybuyAdapterInterface{
    public function pay($amount);
}
```

`TaobaoAdapter.php`接口的构造函数需要将支付宝账户实例注入，因为适配器必须要调用使用支付宝的`sendPayment`方法

```php
class TaobaoAdapter implements BuybuybuyAdapterInterface
{
    private $alipay;

    public function __construct(Alipay $alipay)
    {
        $this->alipay = $alipay;
    }

    public function pay($amount)
    {
        $this->alipay->sendPayment($amount);
    }
}
```

## 测试

```php
//1000元余额的支付宝账户
$aliAccount=new Alipay(1000);
//创建淘宝适配器
$taobaoBuy=new TaobaoAdapter($aliAccount);
//在淘宝进行消费
$taobaoBuy->pay(600);
//创建天猫适配器
$tmallBuy=new TmallAdapter($aliAccount);
//在天猫进行消费
$tmallBuy->pay(300);
//消费过度啦。。。没钱啦。。。
$tmallBuy->pay(500);
```

输出结果：

```
Pay ￥600 via Alipay
Deposit: ￥400
Pay ￥300 via Alipay
Deposit: ￥100
Can't buy anymore! You don't have enough money!
```
