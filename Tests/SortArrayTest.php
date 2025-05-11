<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\SortArray;
use InvalidArgumentException;

class SortArrayTest extends TestCase
{
    /**
     * Testa arrays válidos que devem ser ordenados corretamente.
     */
    #[DataProvider('validArrayProvider')]
    public function testValidArrays(array $input, array $expected): void
    {
        $result = SortArray::sortAscending($input);
        $this->assertEquals($expected, $result);
    }

    public static function validArrayProvider(): array
    {
        return [
            'Input [5,1,0,7,3,3] -> Expected [0,1,3,3,5,7]' => [[5,1,0,7,3,3], [0,1,3,3,5,7]],
            'Input [2, 1] -> Expected [1, 2]' => [[2, 1], [1, 2]],
            'Input [10, 9, 8, 7] -> Expected [7, 8, 9, 10]' => [[10, 9, 8, 7], [7, 8, 9, 10]],
            'Input [1, 2, 3, 4] -> Expected [1, 2, 3, 4]' => [[1, 2, 3, 4], [1, 2, 3, 4]],
            'Input [3, 3, 3] -> Expected [3, 3, 3]' => [[3, 3, 3], [3, 3, 3]],
        ];
    }

    /**
     * Testa arrays inválidos que devem lançar exceções.
     */
    #[DataProvider('invalidArrayProvider')]
    public function testInvalidArrays(array $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        SortArray::sortAscending($input);
    }

    public static function invalidArrayProvider(): array
    {
        return [
            'Input [] -> Expected Exception (menos de 2 elementos)' => [[]],
            'Input [1] -> Expected Exception (menos de 2 elementos)' => [[1]],
            'Input [1, "2", 3] -> Expected Exception (string)' => [[1, "2", 3]],
            'Input [1, 2.5, 3] -> Expected Exception (float)' => [[1, 2.5, 3]],
            'Input [1, null, 3] -> Expected Exception (null)' => [[1, null, 3]],
        ];
    }

    /**
     * Testa o tipo de retorno (sempre array).
     */
    public function testReturnType(): void
    {
        $result = SortArray::sortAscending([4, 2]);
        $this->assertIsArray($result);
    }
}
