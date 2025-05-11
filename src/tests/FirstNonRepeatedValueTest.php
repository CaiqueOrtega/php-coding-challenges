<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\FirstNonRepeatedValue;

class FirstNonRepeatedValueTest extends TestCase
{
    /**
     * Testa arrays válidos com pelo menos um valor não repetido.
     */
    #[DataProvider('validArraysProvider')]
    public function testValidArrays(array $input, int $expected): void
    {
        $result = FirstNonRepeatedValue::find($input);
        fwrite(STDOUT, "Testando array válido " . json_encode($input) . ": retornou {$result}, esperado {$expected}\n");
        $this->assertEquals($expected, $result);
    }

    public static function validArraysProvider(): array
    {
        return [
            [[2, 2, 3, 1, 1, 6], 3],
            [[4, 5, 4, 5, 6], 6],
            [[1, 2, 3, 1, 2], 3],
            [[10], 10],
        ];
    }

    /**
     * Testa arrays inválidos (sem valores únicos ou com elementos não inteiros) que devem retornar null.
     */
    #[DataProvider('invalidArraysProvider')]
    public function testInvalidArrays(array $input): void
    {
        $result = FirstNonRepeatedValue::find($input);
        fwrite(STDOUT, "Testando array inválido " . json_encode($input) . ": retornou " . var_export($result, true) . " (esperado null)\n");
        $this->assertNull($result);
    }

    public static function invalidArraysProvider(): array
    {
        return [
            [[7, 8, 9, 7, 8, 9]],
            [[]],
            [[1, 1, 2, 2, 3, 3]],
            [[1, 2, "3"]],
            [[1, 2, 3.5]],
            [["1", 2, 3]],
            [["not an array"]],
            [[null, 2, 3]],
        ];
    }

    /**
     * Garante que o retorno da função seja int ou null, conforme o caso.
     */
    public function testReturnTypes(): void
    {
        $validResult = FirstNonRepeatedValue::find([4, 4, 9]);
        $nullResult = FirstNonRepeatedValue::find([1, 1]);

        fwrite(STDOUT, "Tipo do retorno (válido): " . gettype($validResult) . "\n");
        fwrite(STDOUT, "Tipo do retorno (sem valor único): " . gettype($nullResult) . "\n");

        $this->assertIsInt($validResult);
        $this->assertNull($nullResult);
    }
}
