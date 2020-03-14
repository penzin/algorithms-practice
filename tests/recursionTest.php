<?php

namespace Penzin\AlgorithmsPractice\Tests;

use PHPUnit\Framework\TestCase;
use function Penzin\AlgorithmsPractice\arraySumRecursive;
use function Penzin\AlgorithmsPractice\factorialRecursive;

class recursionTest extends TestCase
{
    /**
     * @dataProvider factorialSamples
     * @param int $result
     * @param int $input
     */
    public function testCanCalculateFactorialRecursively(int $result, int $input): void
    {
        $this->assertEquals($result, factorialRecursive($input));
    }

    public function testThrowAnExceptionWhenNegativeNumber(): void
    {
        $this->expectException(\RuntimeException::class);
        factorialRecursive(-42);
    }

    /**
     * @dataProvider sumSamples
     * @param array $input
     */
    public function testCanCalculateArraySumRecursively(array $input): void
    {
        $this->assertEquals(
            array_sum($input),
            arraySumRecursive($input)
        );
    }

    /**
     * @return array
     */
    public static function sumSamples(): array
    {
        return [
            [[]],
            [[1]],
            [[2, 3, 4]],
        ];
    }

    /**
     * @return array
     */
    public static function factorialSamples(): array
    {
        return [
            [1, 0],
            [1, 1],
            [2, 2],
            [5040, 7],
        ];
    }
}
