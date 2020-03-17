<?php

namespace Penzin\AlgorithmsPractice\Tests;

use PHPUnit\Framework\TestCase;
use function Penzin\AlgorithmsPractice\dijkstraSearch;

class dijkstraSearchTest extends TestCase
{
    /**
     * @var array
     */
    private $graph = [
        'start' => ['a' => 6, 'b' => 2],
        'a' => ['finish' => 1],
        'b' => ['a' => 3, 'finish' => 5],
        'finish' => [],
    ];

    /**
     * @var array
     */
    private $costs = [
        'a' => 6,
        'b' => 2,
        'finish' => INF,
    ];

    /**
     * @var array
     */
    private $parents = [
        'a' => 'start',
        'b' => 'start',
        'finish' => null
    ];

    public function testCanFindShortestPath(): void
    {
        $this->assertEquals(
            6,
            dijkstraSearch($this->graph, $this->costs, $this->parents)
        );
    }
}
