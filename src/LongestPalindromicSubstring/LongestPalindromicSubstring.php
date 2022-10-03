<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\LongestPalindromicSubstring;

class LongestPalindromicSubstring
{
    public function longestPalindrome(string $s): string
    {
        $longestPalindrome = '';

        for ($i = 0; $i < strlen($s); $i++) {
            $evenPalindrome = $this->findLongestEvenPalindromeFromCenter($s, $i);
            $oddPalindrome = $this->findLongestOddPalindromeFromCenter($s, $i);
            if (strlen($evenPalindrome) > strlen($longestPalindrome)) {
                $longestPalindrome = $evenPalindrome;
            }
            if (strlen($oddPalindrome) > strlen($longestPalindrome)) {
                $longestPalindrome = $oddPalindrome;
            }
        }

        return $longestPalindrome;
    }

    private function findLongestEvenPalindromeFromCenter(string $s, int $center): string
    {
        return $this->findLongestPalindromeFromCenter($s, $center, $center);
    }

    private function findLongestOddPalindromeFromCenter(string $s, int $center): string
    {
        return $this->findLongestPalindromeFromCenter($s, $center, $center+1);
    }

    private function findLongestPalindromeFromCenter(string $s, int $leftPosition, int $rightPosition): string
    {
        $palindrome = '';
        while ($leftPosition >= 0 && $rightPosition < strlen($s) && $s[$leftPosition] === $s[$rightPosition]) {
            $palindrome = substr($s, $leftPosition, $rightPosition - $leftPosition + 1);
            $leftPosition--;
            $rightPosition++;
        }

        return $palindrome;
    }
}
