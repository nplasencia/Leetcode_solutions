<?php

class Solution {

	/**
	 * Hint 1: brute force solution
	 *
	 * @param Integer[] $nums
	 * @param Integer $target
	 * @return Integer[]
	 */
	function twoSum1($nums, $target) {
		for ($i = 0; $i < count($nums); $i++) {
			for ($j = 0; $j < count($nums); $j++) {
				if ($i == $j) continue;
				if ($nums[$i] + $nums[$j] == $target) {
					return [$i, $j];
				}
			}
		}
    }

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
}


