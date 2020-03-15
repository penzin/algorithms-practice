<?php

namespace Penzin\AlgorithmsPractice;

/**
 * @param array $inputTree
 * @param string $headItemName
 * @param callable $searchCriteriaFn
 * @return string|null
 */
function breadFirstSearch(array $inputTree, string $headItemName, callable $searchCriteriaFn): ?string
{
    $graph = preparePlainGraphFromThreeRecursive($inputTree);
    $searchQueue = $graph[$headItemName];
    $touchedItems = [];

    while ($currentItem = array_shift($searchQueue))
    {
        if ($searchCriteriaFn($currentItem) === true) {
            return $currentItem;
        }

        if (in_array($currentItem, $touchedItems, true) === true) {
            continue;
        }

        $touchedItems[] = $currentItem;
        $searchQueue = array_merge($searchQueue, $graph[$currentItem]);
    }

    return null;
}

/**
 * @param array $inputTree
 * @return array
 */
function preparePlainGraphFromThreeRecursive(array $inputTree): array
{
    $graph = [];

    foreach ($inputTree as $key => $item)
    {
        $graph[$key] = array_keys($item);
        if ($item !== []) {
            $graph = array_merge($graph, preparePlainGraphFromThreeRecursive($item));
        }
    }

    return $graph;
}
