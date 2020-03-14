<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param int $number
 * @return int
 */
function factorialRecursively(int $number): int
{
    if ($number < 0) {
        throw new \RuntimeException('Can\'t calculate factorial for a negative number');
    } elseif ($number <= 1) {
        return 1;
    }

    return $number * factorialRecursively($number - 1);
}
