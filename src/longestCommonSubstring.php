<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param string $sample
 * @param array $possibleStringsArray
 * @return string|null
 */
function getLongestCommonSubstring(string $sample, array $possibleStringsArray): ?string
{
    $getCommonSubstringLength = static function(string $sample, string $item) {

        $result = 0;
        $table = [];

        foreach (str_split($sample, 1) as $i => $sampleLetter)
        {
            foreach (str_split($item, 1) as $j => $itemLetter)
            {
                if ($sampleLetter !== $itemLetter) {
                    $table[$i][$j] = 0;
                } else {
                    $table[$i][$j] = ($table[$i - 1][$j - 1] ?? 0) + 1;
                    if ($table[$i][$j] > $result) {
                        $result = $table[$i][$j];
                    }
                }
            }
        }

        return $result;
    };

    if ($sample === '') {
        return null;
    }

    $length = 0;
    $result = null;

    foreach ($possibleStringsArray as $item)
    {
        if (($commonLength = $getCommonSubstringLength($sample, $item)) > $length) {
            $length = $commonLength;
            $result = $item;
        }
    }

    return $result;
}
