<?php

namespace Penzin\AlgorithmsPractice\Tests;

use PHPUnit\Framework\TestCase;
use function Penzin\AlgorithmsPractice\factorial;

class recursionTest extends TestCase
{
    public function testCanCalculateFactorialRecursively(): void
    {
        $this->assertEquals(1, factorial(1));
    }
}
