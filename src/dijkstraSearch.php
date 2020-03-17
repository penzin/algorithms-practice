<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param array $graph
 * @param array $costs
 * @param array $parents
 * @return int
 */
function dijkstraSearch(array $graph, array $costs, array $parents): int
{
    $processed = [];
    while (($node = findLowestCostNode($costs, $processed)) !== null)
    {
        $cost = $costs[$node];
        foreach ($graph[$node] as $neighbor => $neighborCost)
        {
            $newCost = $cost + $neighborCost;
            if ($costs[$neighbor] > $newCost) {
                $costs[$neighbor] = $newCost;
                $parents[$neighbor] = $node;
            }
        }
        $processed[] = $node;
    }

    return array_pop($costs);
}

/**
 * @param array $costs
 * @param array $processed
 * @return string
 */
function findLowestCostNode(array $costs, array $processed): ?string
{
    $lowestCost = INF;
    $lowestNode = null;

    foreach ($costs as $node => $value)
    {
        if ($value < $lowestCost && in_array($node, $processed, true) === false) {
            $lowestCost = $value;
            $lowestNode = $node;
        }
    }

    return $lowestNode;
}
