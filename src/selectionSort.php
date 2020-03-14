<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param array $inputArray
 * @return array
 */
function selectionSort(array $inputArray): array
{
    $result = [];

    while (count($inputArray) > 0)
    {
        $smallestIndex = findSmallestItemIndex($inputArray);
        $result[] = $inputArray[$smallestIndex];
        unset($inputArray[$smallestIndex]);
    }

    return $result;
}

/**
 * @param array $input
 * @return int
 */
function findSmallestItemIndex(array $input): int
{
    $smallest = reset($input);
    $result = key($input);
    unset($input[$result]);

    foreach ($input as $i => $val)
    {
        if ($val < $smallest) {
            $smallest = $val;
            $result = $i;
        }
    }

    return $result;
}
