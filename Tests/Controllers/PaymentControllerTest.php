<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use \App\Controllers\PaymentController;

/**
 * @coversDefaultClass \App\Controllers\PaymentController
 */
class PaymentControllerTest extends TestCase
{
    private $payment;

    protected function setUp(): void
    {
        $this->payment = new PaymentController;
    }

    /**
     * @covers ::total
     */
    public function testPushAndPop(): void
    {
        $total = $this->payment->total(1,2,1);
        $this->assertSame($total , 6);

        # case 2
//        $total = $this->payment->total(1,2,0);
//        $this->assertSame($total , 3);

        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * @dataProvider listEmailAdditionProvider
     * @covers ::validateEmail
     */
    public function testValidateemail($email)
    {
        $myPayment = $this->payment;
        $message = '';
        // Cách để gọi phương thức private/protected
         $pass = $this->invokeMethod($myPayment, 'validateEmail', [$email,$message]);

        $this->assertSame(true, $pass);
    }

    public function listEmailAdditionProvider(): array
    {
        return [
            ['aaa@gmail.com'],
            ['mail1@pavi1etnam.vn'],
            ['mail1@web310s.vn'],
            ['mail1@ggg.vn']
        ];
    }
}
