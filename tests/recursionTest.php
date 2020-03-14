<?php

namespace Penzin\AlgorithmsPractice\Tests;

use PHPUnit\Framework\TestCase;
use function Penzin\AlgorithmsPractice\factorialRecursively;

class recursionTest extends TestCase
{
    public function testCanCalculateFactorialForZeroRecursively(): void
    {
        $this->assertEquals(1, factorialRecursively(0));
    }

    public function testCanCalculateFactorialForOneRecursively(): void
    {
        $this->assertEquals(1, factorialRecursively(1));
    }

    public function testCanCalculateFactorialForTwoRecursively(): void
    {
        $this->assertEquals(2, factorialRecursively(2));
    }

    public function testCanCalculateFactorialForSevenRecursively(): void
    {
        $this->assertEquals(5040, factorialRecursively(7));
    }

    public function testThrowAnExceptionWhenNegativeNumber(): void
    {
        $this->expectException(\RuntimeException::class);
        factorialRecursively(-42);
    }
}
