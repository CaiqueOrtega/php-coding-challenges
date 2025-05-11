<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\ReplaceVowels;
use InvalidArgumentException;

class ReplaceVowelsTest extends TestCase
{
    /**
     * Testa strings válidas e a substituição das vogais por "?".
     */
    #[DataProvider('validStringProvider')]
    public function testValidStrings(string $input, string $expected): void
    {
        $result = ReplaceVowels::replace($input);
        $this->assertEquals($expected, $result);
    }

    public static function validStringProvider(): array
    {
        return [
            'Input "Foo" -> Expected "F??"' => ['Foo', 'F??'],
            'Input "Bar" -> Expected "B?r"' => ['Bar', 'B?r'],
            'Input "Hello" -> Expected "H?ll?"' => ['Hello', 'H?ll?'],
            'Input "Olá" -> Expected "?l?"' => ['Olá', '?l?'],
            'Input "ÁÉÍÓÚ" -> Expected "?????"' => ['ÁÉÍÓÚ', '?????'],
            'Input "Test with spaces" -> Expected "T?st w?th sp?c?s"' => ['Test with spaces', 'T?st w?th sp?c?s'],
        ];
    }

    /**
     * Testa strings inválidas (vazias, com números ou símbolos) que devem lançar exceção.
     */
    #[DataProvider('invalidStringProvider')]
    public function testInvalidStrings(string $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        ReplaceVowels::replace($input);
    }

    public static function invalidStringProvider(): array
    {
        return [
            'Input "" -> Expected InvalidArgumentException' => [''],
            'Input "Hello123" -> Expected InvalidArgumentException' => ['Hello123'],
            'Input "Hello!" -> Expected InvalidArgumentException' => ['Hello!'],
            'Input "Test#String" -> Expected InvalidArgumentException' => ['Test#String'], 
        ];
    }

    /**
     * Testa o tipo de retorno da função (sempre string).
     */
    public function testReturnType(): void
    {
        $result = ReplaceVowels::replace('Test');
        $this->assertIsString($result);
    }
}
