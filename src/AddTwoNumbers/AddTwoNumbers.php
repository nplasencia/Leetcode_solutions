<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\AddTwoNumbers;

class AddTwoNumbers
{
    function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $initialNode = $currentNode = new ListNode();
        $carry = 0;

        while (!is_null($l1) || !is_null($l2) || $carry > 0) {
            $sum = $this->getListNodeValue($l1) + $this->getListNodeValue($l2) + $carry;
            $carry = $this->getCarryTenBased($sum);
            $currentNode->next = new ListNode($sum % 10, null);
            $currentNode = $this->getNextNode($currentNode);

            $l1 = $this->getNextNode($l1);
            $l2 = $this->getNextNode($l2);
        }

        return $initialNode->next;
    }

    private function getListNodeValue(?ListNode $listNode): int
    {
        return $listNode->val ?? 0;
    }

    private function getCarryTenBased(float $number): float
    {
        return floor($number / 10);
    }

    private function getNextNode(?ListNode $listNode): ?ListNode
    {
        return $listNode?->next;
    }
}
