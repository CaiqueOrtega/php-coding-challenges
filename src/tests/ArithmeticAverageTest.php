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
        fwrite(STDOUT, "Testando array válido " . json_encode($input) . ": retornou {$result}, esperado {$expected}\n");
        $this->assertEquals($expected, $result);
    }

    public static function validArraysProvider(): array
    {
        return [
            [[4, 6, 8], 6],
            [[1, 2, 3], 2],
            [[10, 20, 30, 40], 25],
            [[5, 5, 5], 5],
            [[3, 4, 5, 6], 5],
        ];
    }

    /**
     * Testa arrays inválidos (menos de 3 itens ou com itens não inteiros) que devem retornar false.
     */
    #[DataProvider('invalidArraysProvider')]
    public function testInvalidArrays(array $input): void
    {
        $result = ArithmeticAverage::calculate($input);
        fwrite(STDOUT, "Testando array inválido " . json_encode($input) . ": retornou " . var_export($result, true) . " (esperado false)\n");
        $this->assertFalse($result);
    }

    public static function invalidArraysProvider(): array
    {
        return [
            [[1]],
            [[2, 3]],
            [[],],
            [["1", 2, 3]],
            [[1, 2, 3.5]],
            [[1, 2, "3"]],
            [[null]],
            [["not an array"]],
        ];
    }

    /**
     * Testa que o retorno da função seja int ou booleano, conforme o caso.
     */
    public function testReturnTypes(): void
    {
        $validResult = ArithmeticAverage::calculate([3, 3, 3]);
        $invalidResult = ArithmeticAverage::calculate([1, 2]);

        fwrite(STDOUT, "Tipo do retorno (válido): " . gettype($validResult) . "\n");
        fwrite(STDOUT, "Tipo do retorno (inválido): " . gettype($invalidResult) . "\n");

        $this->assertIsInt($validResult);
        $this->assertIsBool($invalidResult);
    }
}
