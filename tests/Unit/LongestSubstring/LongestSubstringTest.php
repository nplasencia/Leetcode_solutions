<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\Tests\LongestSubstring;

use nplasencia\LeetcodeSolutions\LongestSubstring\LongestSubstring;
use PHPUnit\Framework\TestCase;

final class LongestSubstringTest extends TestCase
{
	private LongestSubstring $longestSubstring;

	protected function setUp(): void
	{
		$this->longestSubstring = new LongestSubstring();
	}

	/**
     * @covers LongestSubstring::lengthOfLongestSubstring
	 * @dataProvider dataProvider
	 * @param string $input
	 * @param int $expectedLength
	 */
	public function testLengthOfLongestSubstring(string $input, int $expectedLength): void
	{
		$actual = $this->longestSubstring->lengthOfLongestSubstring($input);
		$this->assertEquals($expectedLength, $actual);
	}

	public function dataProvider(): array
	{
		return [
            ['', 0],
            [' ', 1],
            ['bbbbb', 1],
            ['abcabcbb', 3],
            ['pwwkew', 3],
            ['dvdf', 3],
            ['djvdf', 4],
		];
	}
}
