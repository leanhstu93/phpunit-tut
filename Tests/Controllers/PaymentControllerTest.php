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
}
