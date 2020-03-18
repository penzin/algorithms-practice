<?php

namespace Penzin\AlgorithmsPractice\Tests;

use PHPUnit\Framework\TestCase;
use function Penzin\AlgorithmsPractice\dijkstraSearch;
use function Penzin\AlgorithmsPractice\getCostsArray;
use function Penzin\AlgorithmsPractice\getParentsArray;

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

    public function testCanFindShortestPath(): void
    {
        $this->assertEquals(
            6,
            dijkstraSearch($this->graph)
        );
    }

    public function testCanGetCostsForGraph(): void
    {
        $this->assertEquals(
            [
                'a' => 6,
                'b' => 2,
                'finish' => INF,
            ],
            getCostsArray($this->graph)
        );
    }

    public function testCanGetParentsArrayForGraph(): void
    {
        $this->assertEquals(
            [
                'a' => 'start',
                'b' => 'start',
                'finish' => null
            ],
            getParentsArray($this->graph)
        );
    }
}
