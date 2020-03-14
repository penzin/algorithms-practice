<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param array $inputArray
 * @param int $needle
 * @return int|null
 */
function binarySearch(array $inputArray, int $needle): ?int
{
    $lowBound = 0;
    $highBound = count($inputArray) - 1;

    while ($lowBound < $highBound)
    {
        $middle = ceil($highBound + $lowBound / 2);

        if ($inputArray[$middle] === $needle) {
            return $middle;
        }

        if ($inputArray[$middle] > $needle) {
            $highBound = $middle - 1;
        } else {
            $lowBound = $middle + 1;
        }
    }

    return null;
}
