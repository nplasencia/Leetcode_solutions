<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\Tests\TwoSum;

use nplasencia\LeetcodeSolutions\TwoSum\TwoSum;
use PHPUnit\Framework\TestCase;

final class TwoSumTest extends TestCase
{
	private TwoSum $twoSum;

	protected function setUp(): void
	{
		$this->twoSum = new TwoSum();
	}

	/**
     * @covers TwoSum::twoSum
	 * @dataProvider twoSumDataProvider
	 * @param int[] $nums
	 * @param int $target
	 * @param int[] $expected
	 */
	public function testTwoSumProblem(array $nums, int $target, array $expected): void
	{
		$actual = $this->twoSum->twoSum($nums, $target);
		$this->assertSame($expected, $actual);
	}

	public function twoSumDataProvider(): array
	{
		return [
			[
                [2, 7, 11, 15], 9, [0, 1]
            ],
            [
                [3, 2, 4], 6, [1, 2]
            ],
            [
                [3, 3], 6, [0, 1]
            ]
		];
	}
}
