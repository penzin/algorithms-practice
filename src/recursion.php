<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param int $number
 * @return int
 */
function factorialRecursive(int $number): int
{
    if ($number < 0) {
        throw new \RuntimeException('Can\'t calculate factorial for a negative number');
    }

    if ($number <= 1) {
        return 1;
    }

    return $number * factorialRecursive($number - 1);
}

/**
 * @param array $input
 * @return int
 */
function arraySumRecursive(array $input): int
{
    if ($input === []) {
        return 0;
    }

    return array_shift($input) + arraySumRecursive($input);
}
