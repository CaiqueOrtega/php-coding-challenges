<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use Caique\PhpCodingChallenges\Functions\FileHandler;

class FileHandlerTest extends TestCase
{
    /**
     * Testa se a função conta corretamente as linhas válidas do arquivo.
     */
    public function testFileHandler(): void
    {
        $filePath = __DIR__ . '/../data/data.dat';

        $result = FileHandler::countValidLines($filePath);

        fwrite(STDOUT, "Número de linhas válidas: {$result}\n");
        $this->assertGreaterThan(0, $result);
    }

    /**
     * Testa se a exceção é lançada quando o arquivo não existe ou não pode ser lido.
     */
    public function testFileNotFound(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Arquivo não encontrado ou não pode ser lido.");

        FileHandler::countValidLines('caminho/errado/data.dat');
    }
}
