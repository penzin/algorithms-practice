<?php

namespace Penzin\AlgorithmsPractice;

use PHPUnit\Framework\TestCase;

class setCoverProblemTest extends TestCase
{
    /**
     * @var array
     */
    private $statesToCover = ['mt', 'wa', 'or', 'id', 'nv', 'ut', 'ca', 'az'];

    /**
     * @var array
     */
    private $stations = [
        'kOne' => ['id', 'nv', 'ut'],
        'kTwo' => ['wa', 'id', 'mt'],
        'kThree' => ['or', 'nv', 'ca'],
        'kFour' => ['nv', 'ut'],
        'kFive' => ['ca', 'az'],
    ];

    public function testCenGetListOfStations(): void
    {
        $this->assertEquals(
            ['kOne', 'kTwo', 'kThree', 'kFive'],
            getListToCoverSet($this->statesToCover, $this->stations)
        );
    }
}
