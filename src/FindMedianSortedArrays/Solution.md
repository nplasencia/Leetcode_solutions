# Longest Substring

## Best Solution (33ms) 

With this solution we don't use the php `sort()` function.

```php
/**
 * @param int[] $nums1
 * @param int[] $nums2
 * @return float
 */
function findMedianSortedArrays(array $nums1, array $nums2): float
{
    $totalNums = count($nums1) + count($nums2);
    $half = round($totalNums/2, 0, PHP_ROUND_HALF_DOWN);

    $auxArray = $this->getMergedArrays($nums1, $nums2, $half);
    
    if ($totalNums % 2 === 0) {
        return floatval(($auxArray[$half - 1] + $auxArray[$half]) / 2);
    }

    return floatval($auxArray[$half]);
}

/**
 * @param int[] $nums1
 * @param int[] $nums2
 * @param float $half
 * @return int[]
 */
private function getMergedArrays(array $nums1, array $nums2, float $half): array
{
    $i = $j = $total = 0;
    $auxArray = [];

    while ($total <= $half && $i < count($nums1) && $j < count($nums2)) {
        if ($nums1[$i] >= $nums2[$j]) {
            $auxArray[$total] = $nums2[$j];
            $j++;
        } else {
            $auxArray[$total] = $nums1[$i];
            $i++;
        }
        $total++;
    }

    if ($i === count($nums1)) {
        return array_merge($auxArray, array_slice($nums2, $j));
    }

    return array_merge($auxArray, array_slice($nums1, $i));
}
```

### Time/Space Complexity
