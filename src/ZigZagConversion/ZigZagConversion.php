<?php declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\ZigZagConversion;

class ZigZagConversion
{
    /**
     * @param string $s
     * @param int $numRows
     * @return string
     */
    function convert(string $s, int $numRows): string
    {
        if ($numRows === 1) {
            return $s;
        }

        $convertedString = '';
        for ($currentRow = 0; $currentRow < $numRows; $currentRow++) {
            $nextPosition = $currentRow;
            $jump = 0;

            while ($nextPosition < strlen($s)) {
                $convertedString .= $s[$nextPosition];
                $jump = $this->getJump($numRows, $currentRow, $jump);
                $nextPosition = $nextPosition + $jump;
            }
        }

        return $convertedString;
    }

    private function getJump(int $numRows, int $currentRow, int $previousJump): int
    {
        $maxJump = $numRows * 2 - 2;
        $initialJump = $maxJump - 2 * $currentRow;
        $nextJump = $previousJump === 0 ? $initialJump : $maxJump - $previousJump;

        return $nextJump === 0 ? $maxJump : $nextJump;
    }
}
