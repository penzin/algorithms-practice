<?php

namespace Penzin\AlgorithmsPractice\Tests;

use PHPUnit\Framework\TestCase;
use function Penzin\AlgorithmsPractice\factorialRecursively;

class recursionTest extends TestCase
{
    /**
     * @dataProvider samples
     * @param int $result
     * @param int $input
     */
    public function testCanCalculateFactorialRecursively(int $result, int $input): void
    {
        $this->assertEquals($result, factorialRecursively($input));
    }

    public function testThrowAnExceptionWhenNegativeNumber(): void
    {
        $this->expectException(\RuntimeException::class);
        factorialRecursively(-42);
    }

    /**
     * @return array
     */
    public static function samples(): array
    {
        return [
            [1, 0],
            [1, 1],
            [2, 2],
            [5040, 7],
        ];
    }
}
