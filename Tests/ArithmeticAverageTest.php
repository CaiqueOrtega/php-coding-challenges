<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\ArithmeticAverage;

class ArithmeticAverageTest extends TestCase
{
    /**
     * Testa arrays válidos (com 3 ou mais itens) e suas médias esperadas.
     */
    #[DataProvider('validArraysProvider')]
    public function testValidArrays(array $input, int $expected): void
    {
        $result = ArithmeticAverage::calculate($input);
        $this->assertEquals($expected, $result);
    }

    public static function validArraysProvider(): array
    {
        return [
            'Input [4, 6, 8] -> Expected 6' => [[4, 6, 8], 6],
            'Input [1, 2, 3] -> Expected 2' => [[1, 2, 3], 2],
            'Input [10, 20, 30, 40] -> Expected 25' => [[10, 20, 30, 40], 25],
            'Input [5, 5, 5] -> Expected 5' => [[5, 5, 5], 5],
            'Input [3, 4, 5, 6] -> Expected 5' => [[3, 4, 5, 6], 5],
        ];
    }

    /**
     * Testa arrays inválidos (menos de 3 itens ou com itens não inteiros) que devem retornar false.
     */
    #[DataProvider('invalidArraysProvider')]
    public function testInvalidArrays(array $input): void
    {
        $result = ArithmeticAverage::calculate($input);
        $this->assertFalse($result);
    }

    public static function invalidArraysProvider(): array
    {
        return [
            'Input [1] -> Expected false' => [[1]],
            'Input [2, 3] -> Expected false' => [[2, 3]],
            'Input [] -> Expected false' => [[],],
            'Input ["1", 2, 3] -> Expected false' => [["1", 2, 3]],
            'Input [1, 2, 3.5] -> Expected false' => [[1, 2, 3.5]],
            'Input [1, 2, "3"] -> Expected false' => [[1, 2, "3"]],
            'Input [null] -> Expected false' => [[null]],
            'Input ["not an array"] -> Expected false' => [["not an array"]],
        ];
    }

    /**
     * Testa que o retorno da função seja int ou booleano, conforme o caso.
     */
    public function testReturnTypes(): void
    {
        $validResult = ArithmeticAverage::calculate([3, 3, 3]);
        $invalidResult = ArithmeticAverage::calculate([1, 2]);

        $this->assertIsInt($validResult);
        $this->assertIsBool($invalidResult);
    }
}
