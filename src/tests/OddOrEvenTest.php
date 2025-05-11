<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\OddOrEven;

class OddOrEvenTest extends TestCase
{
    /**
     * Testa arrays válidos e retorna a quantidade correta de números pares.
     */
    #[DataProvider('validArraysProvider')]
    public function testValidArrays(array $input, int $expected): void
    {
        $result = OddOrEven::count($input);
        fwrite(STDOUT, "Testando array válido " . json_encode($input) . ": retornou {$result}, esperado {$expected}\n");
        $this->assertEquals($expected, $result);
    }

    public static function validArraysProvider(): array
    {
        return [
            [[1, 2, 3, 4, 5], 2],
            [[2, 4, 6, 8], 4],
            [[1, 3, 5], 0],
            [[10, 20, 30], 3],
            [[7, 9, 10, 12], 2],
        ];
    }

    /**
     * Testa arrays inválidos (contendo elementos não inteiros ou menores que zero).
     * Esperado que retorne null.
     */
    #[DataProvider('invalidArraysProvider')]
    public function testInvalidArrays(array $input): void
    {
        $result = OddOrEven::count($input);
        fwrite(STDOUT, "Testando array inválido " . json_encode($input) . ": retornou " . var_export($result, true) . " (esperado null)\n");
        $this->assertNull($result);
    }

    public static function invalidArraysProvider(): array
    {
        return [
            // Arrays com valores não inteiros ou menores que zero
            [[-1, 2, 3, 4, 5]],
            [["1", 2, 3, 4]],
            [[1, 2, "3", 4]],
            [[1, 2, 3.5]],
            [[null, 2, 3]],
            [["not an array"]],
            [[],],
        ];
    }

    /**
     * Testa que a função retorna o tipo correto, ou seja, int ou null.
     */
    public function testReturnType(): void
    {
        $validResult = OddOrEven::count([1, 2, 3, 4, 5]);
        $nullResult = OddOrEven::count([1, 2, "3"]);

        fwrite(STDOUT, "Tipo do retorno (válido): " . gettype($validResult) . "\n");
        fwrite(STDOUT, "Tipo do retorno (inválido): " . gettype($nullResult) . "\n");

        $this->assertIsInt($validResult);
        $this->assertNull($nullResult);
    }
}
