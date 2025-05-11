<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\ReplaceVowels;

class ReplaceVowelsTest extends TestCase
{
    /**
     * Testa strings válidas e se as vogais, incluindo as acentuadas, sejam substituídas por "?".
     */
    #[DataProvider('validStringsProvider')]
    public function testReplaceVowels(string $input, string $expected): void
    {
        $result = ReplaceVowels::replace($input);
        fwrite(STDOUT, "Testando string '{$input}': retornou '{$result}', esperado '{$expected}'\n");
        $this->assertEquals($expected, $result);
    }

    public static function validStringsProvider(): array
    {
        return [
            ["Foo", "F??"],
            ["Bar", "B?r"],
            ["Fóo", "F??"],
            ["Acento", "?c?nt?"],
            ["Br?", "Br?"],
            ["Índice", "?nd?c?"],
            ["Olá", "?l?"],
            ["Café", "C?f?"],
        ];
    }

    /**
     * Testa se a função retorna null e imprime erro quando o parâmetro não for uma string válida ou for uma string vazia.
     */
    #[DataProvider('invalidStringsProvider')]
    public function testInvalidStrings($input): void
    {
        $result = ReplaceVowels::replace($input);
        fwrite(STDOUT, "Testando entrada inválida '{$input}': retornou " . var_export($result, true) . " (esperado null)\n");
        $this->assertNull($result);
    }

    public static function invalidStringsProvider(): array
    {
        return [
            [123], 
            [true], 
            [null], 
            [[]],
            [3.14], 
            [["string"]], 
            [''], 
        ];
    }

    /**
     * Testa se o tipo de retorno é string quando a entrada é válida.
     */
    public function testReturnType(): void
    {
        $result = ReplaceVowels::replace("Testando");
        fwrite(STDOUT, "Verificação de tipo: retornou tipo '" . gettype($result) . "'\n");
        $this->assertIsString($result);
    }
}
