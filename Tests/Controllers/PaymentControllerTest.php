<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use App\Controllers\PaymentController;

class PaymentControllerTest extends TestCase
{
    /**
     * @covers App\Controllers\PaymentController
     */
    private $payment;

    protected function setUp(): void
    {
        $this->payment = new PaymentController;
    }
    public function testPushAndPop(): void
    {
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
}
