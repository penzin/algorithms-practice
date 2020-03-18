<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param array $graph
 * @return int
 */
function dijkstraSearch(array $graph): int
{
    $costs = getCostsArray($graph);
    $parents = getParentsArray($graph);

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

/**
 * @param array $graph
 * @return array
 */
function getCostsArray(array $graph): array
{
    $result = [];
    $startNeighbourCosts = array_shift($graph);

    foreach (array_keys($graph) as $node)
    {
        $result[$node] = $startNeighbourCosts[$node] ?? INF;
    }

    return $result;
}

/**
 * @param array $graph
 * @return array
 */
function getParentsArray(array $graph): array
{
    $result = [];
    $startChildren = array_shift($graph);

    foreach (array_keys($graph) as $node)
    {
        $result[$node] = isset($startChildren[$node]) === true ? 'start' : null;
    }

    return $result;
}
