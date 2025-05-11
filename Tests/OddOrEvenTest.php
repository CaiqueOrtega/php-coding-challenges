<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\OddOrEven;
use InvalidArgumentException;

class OddOrEvenTest extends TestCase
{
    /**
     * Testa arrays válidos e a quantidade de números pares.
     */
    #[DataProvider('validArraysProvider')]
    public function testValidArrays(array $input, int $expected): void
    {
        $result = OddOrEven::count($input);
        $this->assertEquals($expected, $result);
    }

    public static function validArraysProvider(): array
    {
        return [
            'Input [1, 2, 3, 4, 5] -> Expected 2' => [[1, 2, 3, 4, 5], 2],
            'Input [2, 4, 6, 8] -> Expected 4' => [[2, 4, 6, 8], 4],
            'Input [1, 3, 5] -> Expected 0' => [[1, 3, 5], 0],
            'Input [10, 20, 30] -> Expected 3' => [[10, 20, 30], 3],
            'Input [1] -> Expected 0' => [[1], 0], 
        ];
    }

    /**
     * Testa arrays inválidos (vazio, com elementos não inteiros ou menores ou iguais a zero).
     */
    #[DataProvider('invalidArraysProvider')]
    public function testInvalidArrays(array $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        OddOrEven::count($input);
    }

    public static function invalidArraysProvider(): array
    {
        return [
            'Input [] -> Expected InvalidArgumentException' => [[]],
            'Input [0, 2, 3] -> Expected InvalidArgumentException' => [[0, 2, 3]],
            'Input [-1, 2, 3] -> Expected InvalidArgumentException' => [[-1, 2, 3]],
            'Input [1.5, 2, 3] -> Expected InvalidArgumentException' => [[1.5, 2, 3]],
            'Input [null, 2, 3] -> Expected InvalidArgumentException' => [[null, 2, 3]],
        ];
    }

    /**
     * Testa o tipo de retorno da função, garantindo que seja um número inteiro.
     */
    public function testReturnType(): void
    {
        $result = OddOrEven::count([1, 2, 3, 4, 5]);
        $this->assertIsInt($result);
    }
}
