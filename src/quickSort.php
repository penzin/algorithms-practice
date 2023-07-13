<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param array $inputArray
 * @return array
 * @throws \Exception
 */
function quickSortRecursive(array $inputArray): array
{
    if (count($inputArray) < 2) {
        return $inputArray;
    }

    $less = $greater = [];
    $baseElementIndex = random_int(0, count($inputArray) - 1);
    $baseElement = $inputArray[$baseElementIndex];
    unset($inputArray[$baseElementIndex]);

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
