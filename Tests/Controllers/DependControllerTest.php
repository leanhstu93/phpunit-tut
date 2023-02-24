<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Foo\CoveredClass
 */
final class DependControllerTest extends TestCase
{
    /**
     * @covers ::publicMethod
     */
    public function testEmpty(): array
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * @depends testEmpty
     * @covers ::publicMethod
     */
    public function testPush(array $stack): array
    {
        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * @depends testPush
     * @covers ::publicMethod
     */
    public function testPop(array $stack): void
    {
        $this->assertSame('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }
}