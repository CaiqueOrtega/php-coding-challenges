<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\CorrespondingMonth;

class CorrespondingMonthTest extends TestCase
{
    /**
     * Testa se os números de mês válidos (1 a 12) retornam corretamente o nome do mês em inglês.
     */
    #[DataProvider('validMonthsProvider')]
    public function testValidMonths(int $month, string $expected): void
    {
        $result = CorrespondingMonth::get($month);
        fwrite(STDOUT, "Testando mês {$month}: retornou '{$result}', esperado '{$expected}'\n");
        $this->assertEquals($expected, $result);
    }

    public static function validMonthsProvider(): array
    {
        return [
            [1, 'January'],
            [2, 'February'],
            [3, 'March'],
            [4, 'April'],
            [5, 'May'],
            [6, 'June'],
            [7, 'July'],
            [8, 'August'],
            [9, 'September'],
            [10, 'October'],
            [11, 'November'],
            [12, 'December']
        ];
    }

    /**
     * Testa se os números de mês inválidos retornam "Unknown Month".
     */
    #[DataProvider('invalidMonthsProvider')]
    public function testInvalidMonths(int $invalidMonth): void
    {
        $result = CorrespondingMonth::get($invalidMonth);
        fwrite(STDOUT, "Testando mês inválido {$invalidMonth}: retornou '{$result}' (esperado 'Unknown Month')\n");
        $this->assertEquals('Unknown Month', $result);
    }

    public static function invalidMonthsProvider(): array
    {
        return [
            [0],
            [13],
            [-1],
            [1000]
        ];
    }

    /**
     * Garante que o tipo de retorno da função seja sempre string, independentemente da entrada.
     */
    public function testReturnType(): void
    {
        $resultValid = CorrespondingMonth::get(1);
        $resultInvalid = CorrespondingMonth::get(13);

        fwrite(STDOUT, "Verificação de tipo (válido): retornou tipo '" . gettype($resultValid) . "'\n");
        fwrite(STDOUT, "Verificação de tipo (inválido): retornou tipo '" . gettype($resultInvalid) . "'\n");

        $this->assertIsString($resultValid);
        $this->assertIsString($resultInvalid);
    }
}
