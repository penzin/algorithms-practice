<?php

namespace Penzin\AlgorithmsPractice;

use PHPUnit\Framework\TestCase;

class sortingTest extends TestCase
{
    /**
     * @dataProvider samples
     * @param array $result
     * @param array $input
     */
    public function testCanSortListWithSelectionSort(array $result, array $input): void
    {
        $this->assertEquals($result, selectionSort($input));
    }

    /**
     * @dataProvider samples
     * @param array $result
     * @param array $input
     */
    public function testCanSortListWithQuickSort(array $result, array $input): void
    {
        $this->assertEquals($result, quickSortRecursive($input));
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
            [[1, 1, 2, 2], [2, 2, 1, 1]],
            [[1, 2], [2, 1]],
            [[1, 2, 3], [1, 2, 3]],
            [[43, 44, 56, 65], [44, 43, 65, 56]],
            [[7, 8, 9], [9, 8, 7]],
            [[42, 42], [42, 42]]
        ];
    }
}
