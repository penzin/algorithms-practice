<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param array $inputArray
 * @return array
 */
function quickSortRecursive(array $inputArray): array
{
    if (count($inputArray) < 2) {
        return $inputArray;
    }

    $less = $greater = [];
    $baseElement = array_shift($inputArray);

    foreach ($inputArray as $item)
    {
        if ($item >= $baseElement) {
            $greater[] = $item;
        } else {
            $less[] = $item;
        }
    }

    return array_merge(quickSortRecursive($less), [$baseElement], quickSortRecursive($greater));
}
