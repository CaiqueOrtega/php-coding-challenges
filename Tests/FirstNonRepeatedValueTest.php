<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\FirstNonRepeatedValue;
use InvalidArgumentException;

class FirstNonRepeatedValueTest extends TestCase
{
    /**
     * Testa arrays válidos que devem retornar o primeiro valor não repetido corretamente.
     */
    #[DataProvider('validArrayProvider')]
    public function testValidArrays(array $input, ?int $expected): void
    {
        $result = FirstNonRepeatedValue::find($input);
        $this->assertEquals($expected, $result);
    }

    public static function validArrayProvider(): array
    {
        return [
            'Input [2, 2, 3, 1, 1, 6] -> Expected 3' => [[2, 2, 3, 1, 1, 6], 3],
            'Input [5, 6, 7, 7, 8] -> Expected 5' => [[5, 6, 7, 7, 8], 5],
            'Input [10, 20, 30, 40, 50] -> Expected 10' => [[10, 20, 30, 40, 50], 10],
            'Input [1, 2, 3, 2, 3, 4] -> Expected 1' => [[1, 2, 3, 2, 3, 4], 1],
            'Input [100, 200, 300] -> Expected 100' => [[100, 200, 300], 100],
        ];
    }

    /**
     * Testa arrays inválidos que devem lançar exceções.
     */
    #[DataProvider('invalidArrayProvider')]
    public function testInvalidArrays(array $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        FirstNonRepeatedValue::find($input);
    }

    public static function invalidArrayProvider(): array
    {
        return [
            'Input [] -> Expected Exception (array vazio)' => [[]],
            'Input [1, "2", 3] -> Expected Exception (string)' => [[1, "2", 3]],
            'Input [1, 2.5, 3] -> Expected Exception (float)' => [[1, 2.5, 3]],
            'Input [1, null, 3] -> Expected Exception (null)' => [[1, null, 3]],
        ];
    }

    /**
     * Testa o tipo de retorno (sempre int ou null).
     */
    public function testReturnType(): void
    {
        $result = FirstNonRepeatedValue::find([1, 2, 3, 2, 3]);
        $this->assertIsInt($result);

        $resultNull = FirstNonRepeatedValue::find([2, 2, 3, 3]);
        $this->assertNull($resultNull);
    }
}
