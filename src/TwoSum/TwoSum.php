<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\TwoSum;

class TwoSum
{
    /**
     * @param int[] $nums
     * @param int $target
     * @return int[]
     */
    function twoSum(array $nums, int $target): array
    {
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
}
