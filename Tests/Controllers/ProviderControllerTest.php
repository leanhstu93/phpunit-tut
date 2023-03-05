<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Controllers\PaymentController
 */
final class ProviderControllerTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     * @covers ::add
     */
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2]
        ];
    }
}