# Two Sum

## Best Solution

```php
function twoSum($nums, $target) {
    $map = [];
    foreach ($nums as $index => $num) {
        $aux = $target - $num;
        if (isset($map[$aux])) {
            return [$map[$aux], $index];
        }

        $map[$num] = $index;
    }

    return [];
}
```

### Time/Space Complexity

- Time Complexity: O(n)
- Space Complexity: O(n)
