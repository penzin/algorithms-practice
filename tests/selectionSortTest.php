<?php

namespace Penzin\AlgorithmsPractice\Tests;

use PHPUnit\Framework\TestCase;
use function Penzin\AlgorithmsPractice\findSmallestItemIndex;
use function Penzin\AlgorithmsPractice\selectionSort;

class selectionSortTest extends TestCase
{
    /**
     * @dataProvider samples
     * @param array $result
     * @param array $input
     */
    public function testCanSortList(array $result, array $input): void
    {
        $this->assertEquals($result, selectionSort($input));
    }

    public function testCanFindSmallest(): void
    {
        $this->assertEquals(0, findSmallestItemIndex([1, 2]));
        $this->assertEquals(1, findSmallestItemIndex([3, 2]));
        $this->assertEquals(0, findSmallestItemIndex([3, 3]));
    }

    /**
     * @return array
     */
    public static function samples(): array
    {
        return [
            [[], []],
            [[11], [11]],
            [[1, 2], [1, 2]],
            [[1, 2], [2, 1]],
            [[1, 2, 3], [1, 2, 3]],
            [[43, 44, 56, 65], [44, 43, 65, 56]],
            [[7, 8, 9], [9, 8, 7]],
        ];
    }
}
