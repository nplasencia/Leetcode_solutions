<?php declare(strict_types = 1);

namespace Unit\RemoveNthNodeFromEndOfList;

use nplasencia\LeetcodeSolutions\RemoveNthNodeFromEndOfList\ListNode;
use nplasencia\LeetcodeSolutions\RemoveNthNodeFromEndOfList\RemoveNthNodeFromEndOfList;
use PHPUnit\Framework\TestCase;

final class RemoveNthNodeFromEndListTest extends TestCase
{
	private RemoveNthNodeFromEndOfList $remover;

	protected function setUp(): void
	{
		$this->remover = new RemoveNthNodeFromEndOfList();
	}

	/**
	 * @covers RemoveNthNodeFromEndOfList::removeNthFromEnd
	 * @dataProvider dataProvider
	 * @param ListNode $inputNode
	 * @param int $elementToRemove
	 * @param ListNode|null $expectedResult
	 */
	public function testLengthOfLongestSubstring(ListNode $inputNode, int $elementToRemove, ?ListNode $expectedResult): void
	{
		$actual = $this->remover->removeNthFromEnd($inputNode, $elementToRemove);
		$this->assertEquals($expectedResult, $actual);
	}

	public function dataProvider(): array
	{
		return [
			[$this->generateLinkedListByArray([1, 2, 3, 4, 5]), 1, $this->generateLinkedListByArray([1, 2, 3, 4])],
			[$this->generateLinkedListByArray([1, 2, 3, 4, 5]), 2, $this->generateLinkedListByArray([1, 2, 3, 5])],
			[$this->generateLinkedListByArray([1, 2, 3, 4, 5]), 5, $this->generateLinkedListByArray([2, 3, 4, 5])],
			[$this->generateLinkedListByArray([1]), 1, $this->generateLinkedListByArray([])],
			[$this->generateLinkedListByArray([1,2]), 1, $this->generateLinkedListByArray([1])],
		];
	}

	/**
	 * @param int[] $values
	 * @return ListNode|null
	 */
	private function generateLinkedListByArray(array $values): ?ListNode
	{
		$nextNode = null;
		for ($i = count($values) - 1; $i >= 0; $i--) {
			$node = new ListNode($values[$i], $nextNode);
			$nextNode = $node;
		}

		return $nextNode;
	}
}
