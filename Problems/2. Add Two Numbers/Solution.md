# Two Sum


## Best Solution (12ms)

```php
function addTwoNumbers($l1, $l2) {
    $firstNode = $currentNode = new ListNode(0);
    $carry = 0;

    while (isset($l1) || isset($l2) || $carry > 0) {
        $value = $carry;

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
```

### Time/Space Complexity

- Time Complexity: O(max(m,n))
- Space Complexity: O(max(m,n))
