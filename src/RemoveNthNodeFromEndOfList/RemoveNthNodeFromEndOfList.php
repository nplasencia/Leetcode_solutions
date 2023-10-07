<?php
declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\RemoveNthNodeFromEndOfList;

class RemoveNthNodeFromEndOfList
{
	function removeNthFromEnd(ListNode $head, int $n): ?ListNode
	{
		if (is_null($head->next)) {
			return null;
		}

		$nodePosition = 0;
		$node = $this->recursiveRemoveNthFromEnd($head, $n, $nodePosition);
		if ($nodePosition + 1 === $n ) {
			$node = $node->next;
		}

		return $node;
	}

	private function recursiveRemoveNthFromEnd(ListNode $node, int $n, int &$nodePosition): ListNode
	{
		if (is_null($node->next)) {
			return $node;
		}

		$this->recursiveRemoveNthFromEnd($node->next, $n, $nodePosition);

		$nodePosition++;
		if ($nodePosition === $n) {
			$nodePosition = -30;
			$this->removeNextNode($node);
		}

		return $node;
	}

	private function removeNextNode(ListNode $head): void
	{
		$nodeToRemove = $head->next;
		$head->next = $nodeToRemove->next;
		$nodeToRemove->next = null;
	}
}
