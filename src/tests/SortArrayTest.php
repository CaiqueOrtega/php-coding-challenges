<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\SortArray;

class SortArrayTest extends TestCase
{
    /**
     * Testa arrays válidos e verifica se são ordenados corretamente em ordem crescente.
     */
    #[DataProvider('validArraysProvider')]
    public function testValidArrays(array $input, array $expected): void
    {
        $result = SortArray::sortAscending($input);
        fwrite(STDOUT, "Testando array válido " . json_encode($input) . ": retornou " . json_encode($result) . ", esperado " . json_encode($expected) . "\n");
        $this->assertEquals($expected, $result);
    }

    public static function validArraysProvider(): array
    {
        return [
            [[5, 1, 0, 7, 3, 3], [0, 1, 3, 3, 5, 7]],
            [[9, 2, 8], [2, 8, 9]],
            [[1, 1, 1], [1, 1, 1]],
            [[100, -5, 0], [-5, 0, 100]],
        ];
    }

    /**
     * Testa arrays inválidos (com itens não inteiros) ou arrays com 0 ou 1 item.
     */
    #[DataProvider('invalidArraysProvider')]
    public function testInvalidArrays(array $input): void
    {
        $result = SortArray::sortAscending($input);
        fwrite(STDOUT, "Testando array inválido " . json_encode($input) . ": retornou " . var_export($result, true) . " (esperado false)\n");
        $this->assertFalse($result);
    }

    public static function invalidArraysProvider(): array
    {
        return [
            [[], false],
            [[1], false], 
            [["1", 2, 3]],  
            [[1, 2, 3.5]], 
            [[1, 2, "3"]],  
            [[null]],
        ];
    }

    /**
     * Testa que o retorno da função seja sempre um array ou booleano, conforme o caso.
     */
    public function testReturnTypes(): void
    {
        $validResult = SortArray::sortAscending([3, 2, 1]);
        $invalidResult = SortArray::sortAscending([1]);

        fwrite(STDOUT, "Tipo do retorno (válido): " . gettype($validResult) . "\n");
        fwrite(STDOUT, "Tipo do retorno (inválido): " . gettype($invalidResult) . "\n");

        $this->assertIsArray($validResult);
        $this->assertIsBool($invalidResult);
    }
}
