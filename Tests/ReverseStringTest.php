<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\ReverseString;
use InvalidArgumentException;

class ReverseStringTest extends TestCase
{
    /**
     * Testa strings válidas que devem ser invertidas corretamente.
     */
    #[DataProvider('validStringProvider')]
    public function testValidStrings(string $input, string $expected): void
    {
        $result = ReverseString::reverse($input);
        $this->assertEquals($expected, $result);
    }

    public static function validStringProvider(): array
    {
        return [
            'Input "foo" -> Expected "oof"' => ['foo', 'oof'],
            'Input "bar" -> Expected "rab"' => ['bar', 'rab'],
            'Input "OpenAI" -> Expected "IAnepO"' => ['OpenAI', 'IAnepO'],
            'Input "Olá Mundo" -> Expected "odnuM álO"' => ['Olá Mundo', 'odnuM álO'],
            'Input "123abc" -> Expected "cba321"' => ['123abc', 'cba321'],
            'Input "A" -> Expected "A"' => ['A', 'A'],
        ];
    }

    /**
     * Testa strings inválidas (vazias) que devem lançar exceção.
     */
    #[DataProvider('invalidStringProvider')]
    public function testInvalidStrings(string $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        ReverseString::reverse($input);
    }

    public static function invalidStringProvider(): array
    {
        return [
            'Input "" -> Expected InvalidArgumentException' => [''],
        ];
    }

    /**
     * Testa o tipo de retorno da função (sempre string).
     */
    public function testReturnType(): void
    {
        $result = ReverseString::reverse('PHPUnit');
        $this->assertIsString($result);
    }
}
