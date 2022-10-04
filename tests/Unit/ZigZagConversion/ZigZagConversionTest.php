<?php
declare(strict_types = 1);

namespace nplasencia\LeetcodeSolutions\Tests\ZigZagConversion;

use nplasencia\LeetcodeSolutions\ZigZagConversion\ZigZagConversion;
use PHPUnit\Framework\TestCase;

final class ZigZagConversionTest extends TestCase
{
    private ZigZagConversion $converter;

    protected function setUp(): void
    {
        $this->converter = new ZigZagConversion();
    }

    /**
     * @covers ZigZagConversion::convert
     * @dataProvider zigZagConversionDataProvider
     * @param string $input
     * @param int $rows
     * @param string $expected
     */
    public function testZigZagConversionProblem(string $input, int $rows, string $expected): void
    {
        $actual = $this->converter->convert($input, $rows);
        $this->assertSame($expected, $actual);
    }

    public function zigZagConversionDataProvider(): array
    {
        return [
            ['PAYPALISHIRING', 1, 'PAYPALISHIRING'],
            ['PAYPALISHIRING', 3, 'PAHNAPLSIIGYIR'],
            ['PAYPALISHIRING', 4, 'PINALSIGYAHRPI'],
        ];
    }
}
