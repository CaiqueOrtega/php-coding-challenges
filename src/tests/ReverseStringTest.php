<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\ReverseString;

class ReverseStringTest extends TestCase
{
    /**
     * Testa strings válidas e verifica se a função retorna a string invertida corretamente.
     */
    #[DataProvider('validStringsProvider')]
    public function testReverseString(string $input, string $expected): void
    {
        $result = ReverseString::reverse($input);
        fwrite(STDOUT, "Testando string '{$input}': retornou '{$result}', esperado '{$expected}'\n");
        $this->assertEquals($expected, $result);
    }

    public static function validStringsProvider(): array
    {
        return [
            ["foo", "oof"],
            ["bar", "rab"],
            ["hello", "olleh"],
            ["world", "dlrow"],
            ["php", "php"],
        ];
    }

    /**
     * Testa se a função retorna null e imprime erro quando o parâmetro não for uma string válida ou for uma string vazia.
     */
    #[DataProvider('invalidStringsProvider')]
    public function testInvalidStrings($input): void
    {
        $result = ReverseString::reverse($input);
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
        ];
    }

    /**
     * Testa se a função retorna uma string quando a entrada for válida.
     */
    public function testReturnType(): void
    {
        $result = ReverseString::reverse("test");
        fwrite(STDOUT, "Verificação de tipo: retornou tipo '" . gettype($result) . "'\n");
        $this->assertIsString($result);
    }

    /**
     * Testa se a função retorna uma string vazia quando recebe uma string vazia.
     */
    public function testEmptyString(): void
    {
        $result = ReverseString::reverse("");
        fwrite(STDOUT, "Testando string vazia: retornou '{$result}', esperado ''\n");
        $this->assertEquals("", $result);
    }
}
