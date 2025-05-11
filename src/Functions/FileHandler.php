<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

/**
 * Your function need to read the file data.dat and return how many lines there are where the number of 0's is a multiple of 3 or the numbers of 1s is a multiple of 2.
 *
 * A função deverá ler o arquivo data.dat e retornar o número de linhas que atende pelo menos uma das condições abaixo:
 * 1 - A quantidade de números zeros na linha é um multiplo de 3
 * 2 - A quantidade de números 1 é um multiplo de 2
 *
 * @return int
 */
class FileHandler
{
    public static function countValidLines(string $filePath): int
    {
        if (!is_readable($filePath)) {
            throw new \RuntimeException("Arquivo não encontrado ou não pode ser lido.");
        }

        $file = fopen($filePath, 'r');

        $validLineCount = 0;

        while (($line = fgets($file)) !== false) {
            $line = trim($line);
            $zeros = substr_count($line, '0');
            $ones = substr_count($line, '1');

            if ($zeros % 3 === 0 || $ones % 2 === 0) {
                $validLineCount++;
            }
        }

        fclose($file);

        return $validLineCount;
    }
}
