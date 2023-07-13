<?php

namespace Penzin\AlgorithmsPractice;

use PHPUnit\Framework\TestCase;

class dijkstraSearchTest extends TestCase
{
    /**
     * @var array
     */
    private $graph1 = [
        'start' => ['a' => 6, 'b' => 2],
        'a' => ['finish' => 1],
        'b' => ['a' => 3, 'finish' => 5],
        'finish' => [],
    ];

    /**
     * @var array
     */
    private $graph2 = [
        'start' => ['a' => 4, 'b' => 3, 'c' => 40],
        'a' => ['d' => 8],
        'b' => ['c' => 1, 'finish' => 20],
        'c' => ['d' => 2, 'finish' => 15],
        'd' => ['finish' => 4],
        'finish' => [],
    ];

    /**
     * @var array
     */
    private $graph3 = [
        'start' => ['finish' => 42],
        'finish' => [],
    ];

    /**
     * @var array
     */
    private $graph4 = [
        'start' => ['a' => 5],
        'a' => ['finish' => 6],
        'finish' => [],
    ];

    /**
     * @var array
     */
    private $graph5 = [
        'start' => ['a' => 5],
        'a' => ['b' => 3, 'c' => 7],
        'b' => ['d' => 2],
        'c' => [],
        'd' => ['finish' => 1],
        'finish' => [],
    ];

    /**
     * @dataProvider findShortestPathDataProvider
     * @param array $graph
     * @param int $result
     */
    public function testCanFindShortestPath(array $graph, int $result): void
    {
        $this->assertEquals($result, dijkstraSearch($graph));
    }

    /**
     * @dataProvider getCostArrayDataProvider
     * @param array $graph
     * @param array $result
     */
    public function testCanGetCostsForGraph(array $graph, array $result): void
    {
        $this->assertEquals($result, getCostsArray($graph));
    }

    /**
     * @dataProvider getParentArrayDataProvider
     * @param array $graph
     * @param array $result
     */
    public function testCanGetParentsArrayForGraph(array $graph, array $result): void
    {
        $this->assertEquals($result, getParentsArray($graph));
    }

    /**
     * @dataProvider findLowestCostNodeDataProvider
     * @param array $costs
     * @param array $processed
     * @param string|null $result
     */
    public function testCanFindLowestCostNode(array $costs, array $processed, ?string $result): void
    {
        $this->assertEquals($result, findLowestCostNode($costs, $processed));
    }

    /**
     * @return array
     */
    public function findShortestPathDataProvider(): array
    {
        return [
            [$this->graph1, 6],
            [$this->graph2, 10],
            [$this->graph3, 42],
            [$this->graph4, 11],
            [$this->graph5, 11],
        ];
    }

    /**
     * @return array
     */
    public function getCostArrayDataProvider(): array
    {
        return [
            [$this->graph1, ['a' => 6, 'b' => 2, 'finish' => INF]],
            [$this->graph2, ['a' => 4, 'b' => 3, 'c' => 40, 'd' => INF, 'finish' => INF]],
            [$this->graph3, ['finish' => 42]],
            [$this->graph4, ['a' => 5, 'finish' => INF]],
            [$this->graph5, ['a' => 5, 'b' => INF, 'c' => INF, 'd' => INF, 'finish' => INF]],
        ];
    }

    /**
     * @return array
     */
    public function getParentArrayDataProvider(): array
    {
        return [
            [$this->graph1, ['a' => 'start', 'b' => 'start', 'finish' => null]],
            [$this->graph2, ['a' => 'start', 'b' => 'start', 'c' => 'start', 'd' => null, 'finish' => null]],
            [$this->graph3, ['finish' => 'start']],
            [$this->graph4, ['a' => 'start', 'finish' => null]],
            [$this->graph5, ['a' => 'start', 'b' => null, 'c' => null, 'd' => null, 'finish' => null]],
        ];
    }

    /**
     * @return array
     */
    public static function findLowestCostNodeDataProvider(): array
    {
        return [
            [['a' => 1, 'b' => 2], [], 'a'],
            [['a' => 0], [], 'a'],
            [['one' => 10, 'two' => 7, 'three' => INF], [], 'two'],
            [['a' => 1, 'b' => 2], ['a'], 'b'],
            [['a' => 1, 'b' => 2], ['a', 'b'], null],
        ];
    }
}
