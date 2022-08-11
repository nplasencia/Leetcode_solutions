<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\Tests\FindMedianSortedArrays;

use nplasencia\LeetcodeSolutions\FindMedianSortedArrays\FindMedianSortedArrays;
use PHPUnit\Framework\TestCase;

final class FindMedianSortedArraysTest extends TestCase
{
	private FindMedianSortedArrays $findMedianSortedArrays;

	protected function setUp(): void
	{
		$this->findMedianSortedArrays = new FindMedianSortedArrays();
	}

	/**
     * @covers FindMedianSortedArrays::findMedianSortedArrays
	 * @dataProvider dataProvider
	 * @param int[] $nums1
     * @param int[] $nums2
	 * @param float $expected
	 */
	public function testFindMedianSortedArrays(array $nums1, array $nums2, float $expected): void
	{
		$actual = $this->findMedianSortedArrays->findMedianSortedArrays($nums1, $nums2);
		$this->assertSame($expected, $actual);
	}

	public function dataProvider(): array
	{
		return [
            [[2], [], 2.0],
            [[], [3], 3.0],
            [[-10**6], [], floatval(-10**6)],
            [[], [10**6], floatval(10**6)],
            [[2], [0], 1.0],
            [[1], [2], 1.5],
            [[1, 3], [2], 2.0],
            [[1, 2], [3, 4], 2.5],
            [[1, 4], [2, 3], 2.5],
            [[1, 3], [2, 4], 2.5],
            [[], [2, 3], 2.5],
		];
	}
}
