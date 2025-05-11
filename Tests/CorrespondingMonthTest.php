<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\CorrespondingMonth;

class CorrespondingMonthTest extends TestCase
{
    /**
     * Testa meses válidos (números entre 1 e 12) e seus nomes correspondentes.
     */
    #[DataProvider('validMonthProvider')]
    public function testValidMonths(int $month, string $expected): void
    {
        $result = CorrespondingMonth::get($month);
        $this->assertEquals($expected, $result);
    }

    public static function validMonthProvider(): array
    {
        return [
            'Input 1 -> Expected January' => [1, 'January'],
            'Input 2 -> Expected February' => [2, 'February'],
            'Input 3 -> Expected March' => [3, 'March'],
            'Input 4 -> Expected April' => [4, 'April'],
            'Input 5 -> Expected May' => [5, 'May'],
            'Input 6 -> Expected June' => [6, 'June'],
            'Input 7 -> Expected July' => [7, 'July'],
            'Input 8 -> Expected August' => [8, 'August'],
            'Input 9 -> Expected September' => [9, 'September'],
            'Input 10 -> Expected October' => [10, 'October'],
            'Input 11 -> Expected November' => [11, 'November'],
            'Input 12 -> Expected December' => [12, 'December'],
        ];
    }

    /**
     * Testa meses inválidos (valores fora do intervalo 1-12) e a saída esperada.
     */
    #[DataProvider('invalidMonthProvider')]
    public function testInvalidMonths(int $month): void
    {
        $result = CorrespondingMonth::get($month);
        $this->assertEquals('Mês Desconhecido', $result);
    }

    public static function invalidMonthProvider(): array
    {
        return [
            'Input 0 -> Expected "Mês Desconhecido"' => [0],
            'Input 13 -> Expected "Mês Desconhecido"' => [13],
            'Input -1 -> Expected "Mês Desconhecido"' => [-1],
            'Input 100 -> Expected "Mês Desconhecido"' => [100],
            'Input 999 -> Expected "Mês Desconhecido"' => [999],
        ];
    }

    /**
     * Testa que o retorno seja sempre uma string.
     */
    public function testReturnType(): void
    {
        $validResult = CorrespondingMonth::get(1);
        $invalidResult = CorrespondingMonth::get(13);

        $this->assertIsString($validResult);
        $this->assertIsString($invalidResult);
    }
}
