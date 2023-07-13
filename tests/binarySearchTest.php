<?php

namespace Penzin\AlgorithmsPractice;

use PHPUnit\Framework\TestCase;

class binarySearchTest extends TestCase
{
    /**
     * @var array
     */
    private $inputPresortedArray = [1, 2, 5, 42, 67, 76, 98, 134, 546, 7794, 8000, 9000, 12345];

    /**
     * @dataProvider samples
     * @param int|null $result
     * @param int $input
     */
    public function testCanFindAValue(?int $result, int $input): void
    {
        $this->assertEquals($result, binarySearch($this->inputPresortedArray, $input));
    }

    /**
     * @return array
     */
    public static function samples(): array
    {
        return [
            [0, 1],
            [3, 42],
            [7, 134],
            [11, 9000],
            [null, -5],
            [null, 43],
            [null, 123456],
        ];
    }
}
