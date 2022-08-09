<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\LongestSubstring;

class LongestSubstring
{
    function lengthOfLongestSubstring(string $s): int
    {
        $charactersFound = [];
        $length = $windowFirstIndex = $windowLastIndex = 0;
        while ($windowLastIndex < strlen($s)) {
            $char = $s[$windowLastIndex];
            if (!array_key_exists($char, $charactersFound)) {
                $charactersFound[$char] = $windowLastIndex;
                $windowLastIndex++;
                $length = max($length, $windowLastIndex - $windowFirstIndex);
            } else {
                $firstIndexChar = $s[$windowFirstIndex];
                unset($charactersFound[$firstIndexChar]);
                $windowFirstIndex++;
            }
        }

        return $length;
    }
}
