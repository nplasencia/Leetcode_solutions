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

		$numberOfNodes = $this->countListNodes($head);
		if ($n === $numberOfNodes) {
			$nodeToRemove = $head;
			$head = $nodeToRemove->next;
			$nodeToRemove->next = null;
			return $head;
		}
		$originalHead = $head;

		for ($i = 0; $i < $numberOfNodes; $i++) {
			if ($i === $numberOfNodes - $n - 1) {
				$this->removeNextNode($head);
				break;
			}
			$head = $head->next;
		}

		return $originalHead;
	}

	private function countListNodes(ListNode $head): int
	{
		$count = 1;
		while (!is_null($head->next)) {
			$count++;
			$head = $head->next;
		}

		return $count;
	}

	private function removeNextNode(ListNode $head): void
	{
		$nodeToRemove = $head->next;
		$head->next = $nodeToRemove->next;
		$nodeToRemove->next = null;
	}
}
