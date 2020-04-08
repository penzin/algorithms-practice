<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param array $setToCover
 * @param array $listOfCoveringSets
 * @return array
 */
function getListToCoverSet(array $setToCover, array $listOfCoveringSets): array
{
    $result = [];
    $neededSet = $setToCover;

    while (count($neededSet) > 0)
    {
        $coveredByItem = [];
        $bestFitItem = null;

        foreach ($listOfCoveringSets as $item => $itemSet)
        {
            $covering = array_intersect($neededSet, $itemSet);

            if (count($covering) > count($coveredByItem)) {
                $coveredByItem = $itemSet;
                $bestFitItem = $item;
            }
        }

        $result[] = $bestFitItem;
        $neededSet = array_diff($neededSet, $coveredByItem);
    }

    return $result;
}
