<?php declare(strict_types=1);

use Tests\Controllers\CsvFileIterator;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Foo\CoveredClass
 */
final class Provider2ControllerTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionProvider(): CsvFileIterator
    {
        return new CsvFileIterator('data.csv');
    }
}