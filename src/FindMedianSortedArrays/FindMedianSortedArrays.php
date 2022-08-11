<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\FindMedianSortedArrays;

class FindMedianSortedArrays
{
    /**
     * @param int[] $nums1
     * @param int[] $nums2
     * @return float
     */
    function findMedianSortedArrays(array $nums1, array $nums2): float
    {
        $mergedArrays = $this->getMergedArrays($nums1, $nums2);
        return $this->getMedian($mergedArrays);
    }

    /**
     * @param int[] $nums1
     * @param int[] $nums2
     * @return int[]
     */
    private function getMergedArrays(array $nums1, array $nums2): array
    {
        $i = $j = 0;
        $firstHalfArray = $this->getFirstHalfOfMergedArray($nums1, $nums2, $i, $j);
        $secondHalfArray = $this->getSecondHalfOfMergedArray($nums1, $nums2, $i, $j);

        return array_merge($firstHalfArray, $secondHalfArray);
    }

    /**
     * @param int[] $nums1
     * @param int[] $nums2
     * @param int $i
     * @param int $j
     * @return int[]
     */
    private function getFirstHalfOfMergedArray(array $nums1, array $nums2, int &$i, int &$j): array
    {
        $total = 0;
        $auxArray = [];

        $half = $this->calculateHalfPositionOfTwoArrays($nums1, $nums2);

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

        return $auxArray;
    }

    /**
     * @param int[] $nums1
     * @param int[] $nums2
     * @return float
     */
    private function calculateHalfPositionOfTwoArrays(array $nums1, array $nums2): float
    {
        $totalNums = count($nums1) + count($nums2);
        return round($totalNums/2, 0, PHP_ROUND_HALF_DOWN);
    }

    /**
     * @param int[] $nums1
     * @param int[] $nums2
     * @param int $i
     * @param int $j
     * @return int[]
     */
    private function getSecondHalfOfMergedArray(array $nums1, array $nums2, int $i, int $j): array
    {
        if ($i === count($nums1)) {
            return array_slice($nums2, $j);
        }

        return array_slice($nums1, $i);
    }

    /**
     * @param int[] $values
     * @return float
     */
    private function getMedian(array $values): float
    {
        $half = $this->calculateHalfPositionOfTwoArrays($values, []);

        if (count($values) % 2 === 0) {
            return floatval(($values[$half - 1] + $values[$half]) / 2);
        }

        return floatval($values[$half]);
    }
}
