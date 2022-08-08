<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\Tests\AddTwoNumbers;

use nplasencia\LeetcodeSolutions\AddTwoNumbers\AddTwoNumbers;
use nplasencia\LeetcodeSolutions\AddTwoNumbers\ListNode;
use PHPUnit\Framework\TestCase;

final class AddTwoNumbersTest extends TestCase
{
	private AddTwoNumbers $addTwoNumbers;

	protected function setUp(): void
	{
		$this->addTwoNumbers = new AddTwoNumbers();
	}

	/**
     * @covers AddTwoNumbers::addTwoNumbers
	 * @dataProvider addTwoNumbersDataProvider
	 * @param ListNode[] $l1
	 * @param ListNode[] $l2
	 * @param ListNode[] $expected
	 */
	public function testAddTwoNumbersProblems(array $l1, array $l2, array $expected): void
	{
        $listNode1 = $this->arrayToListNode($l1);
        $listNode2 = $this->arrayToListNode($l2);
        $expectedListNode = $this->arrayToListNode($expected);

		$actual = $this->addTwoNumbers->addTwoNumbers($listNode1, $listNode2);
		$this->assertEquals($expectedListNode, $actual);
	}

	public function addTwoNumbersDataProvider(): array
	{
		return [
            [
                [0], [1], [1]
            ],
            [
                [9], [1], [0, 1]
            ],
			[
                [2, 4, 3],
                [5, 6, 4],
                [7, 0, 8]
            ],
            [
                [9, 9, 9, 9, 9, 9, 9],
                [9, 9, 9, 9],
                [8, 9, 9, 9, 0, 0, 0, 1]
            ],
            [
                [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
                [5, 6, 4],
                [6, 6, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1]
            ]
		];
	}

    /**
     * @param int[] $array
     * @return ListNode
     */
    private function arrayToListNode(array $array): ListNode
    {
        $array = array_reverse($array);
        $lastNode = null;
        foreach ($array as $nodeVal) {
            $lastNode = new ListNode($nodeVal, $lastNode);
        }

        return $lastNode;
    }
}
