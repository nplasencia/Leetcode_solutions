# Two Sum

## Best Solution (19ms)

```php
function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
{
    $initialNode = $currentNode = new ListNode();
    $carry = 0;

    while(!is_null($l1) || !is_null($l2) || $carry > 0) {
        $sum = ($l1->val ?? 0) + ($l2->val ?? 0) + $carry;
        $carry = floor($sum / 10);
        $currentNode->next = new ListNode($sum % 10, null);
        $currentNode = $currentNode->next;

        $l1 = $l1?->next;
        $l2 = $l2?->next;
    }

    return $initialNode->next;
}
```

### Time/Space Complexity

- Time Complexity: O(max(m,n))
- Space Complexity: O(max(m,n))

## Best Clean-Code Solution (37ms)

```php
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
```
