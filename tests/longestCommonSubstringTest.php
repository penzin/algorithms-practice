<?php

namespace Penzin\AlgorithmsPractice;

use PHPUnit\Framework\TestCase;

class longestCommonSubstringTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param string $sample
     * @param array $array
     * @param string|null $result
     */
    public function testCanFindLongestCommonSubstringTest(string $sample, array $array, ?string $result): void
    {
        $this->assertEquals(
            $result,
            getLongestCommonSubstring($sample, $array)
        );
    }

    /**
     * @return array
     */
    public static function dataProvider(): array
    {
        return [
            ['john', [], null],
            ['', ['f', 'fa', 'ar', 'c'], null],
            ['a', ['', 'b'], null],
            ['like', ['mike', 'bike', 'pie'], 'mike'],
            ['run', ['thunderstruck'], 'thunderstruck'],
            ['run', ['thunderstruck', 'nur'], 'thunderstruck'],
            ['f', ['f', 'fa', 'ar', 'c'], 'f'],
            ['f', ['d', 'fa', 'ar', 'c'], 'fa'],
            ['fun', ['d', 'funk', 'fuck', 'unfun'], 'funk'],
            ['foo', ['foo', 'bar', 'baz'], 'foo'],
            ['limp', ['limb', 'bizkit', 'im'], 'limb'],
        ];
    }
}
