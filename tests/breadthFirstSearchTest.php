<?php

namespace Penzin\AlgorithmsPractice;

use PHPUnit\Framework\TestCase;

class breadthFirstSearchTest extends TestCase
{
    /**
     * @var array
     */
    private $inputTree = [
        'Me (male)' => [
            'John (male)' => [],
            'Alex (male)' => [
                'Ivan (male)' => [],
                'Borat (male)' => [
                    'Victor jr. (male)' => [],
                    'Susanna (female)' => [],
                ]
            ],
            'Maxim (male)' => [
                'Julia (female)' => [],
                'Rita (female)' => [],
            ],
            'Victor sr. (male)' => []
        ]
    ];

    public function testCanFindAFirstNearestGirl(): void
    {
        $this->assertEquals(
            'Julia (female)',
            breadthFirstSearch(
                $this->inputTree,
                'Me (male)',
                static function (string $item){
                    return (strpos($item, '(female)') !== false);
                })
        );
    }

    public function testCanFindANearestVictor(): void
    {
        $this->assertEquals(
            'Victor sr. (male)',
            breadthFirstSearch(
                $this->inputTree,
                'Me (male)',
                static function (string $item){
                    return (strpos($item, 'Victor') !== false);
                })
        );
    }

    public function testCanNotFindANearestBob(): void
    {
        $this->assertNull(
            breadthFirstSearch(
                $this->inputTree,
                'Me (male)',
                static function (string $item){
                    return (strpos($item, 'Bob') !== false);
                })
        );
    }

    /**
     * @dataProvider samples
     * @param array $result
     * @param array $input
     */
    public function testCanConvertTreeToPlainGraphArray(array $input, array $result): void
    {
        $this->assertEquals($result, preparePlainGraphFromThreeRecursive($input));
    }

    /**
     * @return array
     */
    public static function samples(): array
    {
        return [
            [
                [], [],
            ],
            [
                ['me' => []], ['me' => []]
            ],
            [
                [
                    'me' => [
                        'John' => [],
                        'Steve' => [],
                    ]
                ],
                [
                    'me' => ['John', 'Steve'],
                    'John' => [],
                    'Steve' => [],
                ]
            ],
            [
                [
                    'me' => [
                        'John' => [
                            'Ivan' => [],
                            'Susanna' => [
                                'Lena' => []
                            ]
                        ],
                        'Steve' => [],
                        'Patrick' => [
                            'Bob' => []
                        ]
                    ]
                ],
                [
                    'me' => ['John', 'Steve', 'Patrick'],
                    'John' => ['Ivan', 'Susanna'],
                    'Ivan' => [],
                    'Susanna' => ['Lena'],
                    'Lena' => [],
                    'Steve' => [],
                    'Patrick' => ['Bob'],
                    'Bob' => [],
                ]
            ]
        ];
    }
}
