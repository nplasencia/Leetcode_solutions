# Two Sum


## Best Solution

```php
function twoSum($nums, $target) {
    $map = [];
    for ($i = 0; $i < count($nums); $i++) {
        $aux = $target - $nums[$i];
        if (array_key_exists($aux, $map)) {
            return [$map[$aux], $i];
        }
        $map[$nums[$i]] = $i;
    }
}
```

### Time/Space Complexity

- Time Complexity: O(n)
- Space Complexity: O(n)
