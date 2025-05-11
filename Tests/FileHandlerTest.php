<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Caique\PhpCodingChallenges\Functions\FileHandler;

class FileHandlerTest extends TestCase
{
    /**
     * Testa a contagem de linhas válidas em um arquivo.
     * Verifica se o número de linhas válidas é maior que 0 e se o valor retornado é um inteiro.
     */
    #[DataProvider('validLineCountProvider')]
    public function testFileHandlerWithLineCount(int $lineCount): void
    {
        $this->assertGreaterThan(
            0,
            $lineCount,
            "Deve haver pelo menos uma linha válida. Encontradas: $lineCount"
        );

        $this->assertIsInt(
            $lineCount,
            "O número de linhas válidas deve ser um inteiro. Valor: $lineCount"
        );
    }

    /**
     * Fornece casos de teste válidos para a contagem de linhas.
     * Retorna o número de linhas válidas encontradas no arquivo.
     */
    public static function validLineCountProvider(): array
    {
        $filePath = __DIR__ . '/../src/Data/data.dat';
        $count = FileHandler::countValidLines($filePath);

        return [
            "Linhas válidas encontradas: $count" => [$count]
        ];
    }

    /**
     * Testa o comportamento quando o arquivo não é encontrado.
     * Espera-se que uma exceção de RuntimeException seja lançada com a mensagem apropriada.
     */
    public function testFileNotFound(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Arquivo não encontrado ou não pode ser lido.");

        FileHandler::countValidLines('caminho/errado/data.dat');
    }
}
