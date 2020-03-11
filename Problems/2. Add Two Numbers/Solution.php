<?php

/**
 * Definition for a singly-linked list.
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }

    function addNode(ListNode $nextNode = null)
    {
        $this->next = $nextNode;

        return $this;
    }
}

class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     *
     * @return ListNode
     */
    function addTwoNumbers(ListNode $l1, ListNode $l2)
    {
        $firstNode = $currentNode = new ListNode(0);
        $carry = 0;

        while (isset($l1) || isset($l2) || $carry > 0) {
            $value = $carry + ($l1->val ?? 0) + ($l2->val ?? 0);

            if (isset($l1)) {
                $value += $l1->val;
                $l1 = $l1->next;
            }

            if (isset($l2)) {
                $value += $l2->val;
                $l2 = $l2->next;
            }

            $carry = floor($value / 10);
            $currentNode->next = new ListNode($value % 10);
            $currentNode = $currentNode->next;
        }

        return $firstNode->next;
    }
}

$number1 = 342;
$number2 = 465;

echo("<p>We go to sum $number1 and $number2</p>");

$numbersToAdd = [$number1, $number2];
$lists        = [];

foreach ($numbersToAdd as $number) {
    $stringNumber = (string)$number;

    $lastNode = null;
    for ($i = 0; $i < strlen($stringNumber); $i++) {
        $listNode = new ListNode((int)$stringNumber[$i]);
        $lastNode = $listNode->addNode($lastNode);
    }
    $lists[] = $lastNode;
}
$solution = new Solution();

$res = $solution->addTwoNumbers($lists[0], $lists[1]);

$message = 'RESULT:';
while (isset($res)) {
    $message .= " [{$res->val}] ->";
    $res     = $res->next;
}
echo("<p>$message null</p>");
