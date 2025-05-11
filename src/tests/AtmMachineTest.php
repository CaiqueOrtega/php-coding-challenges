<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\AtmMachine;
use InvalidArgumentException; 


class AtmMachineTest extends TestCase
{
    /**
     * Testa arrays válidos e verifica se o saque retorna o número mínimo de cédulas.
     */
    #[DataProvider('validWithdrawalsProvider')]
    public function testValidWithdrawals(int $valor, array $cedulas, array $esperado): void
    {
        $resultado = AtmMachine::withdraw($valor, $cedulas);
        fwrite(STDOUT, "Testando saque de {$valor} com cédulas " . json_encode($cedulas) . ": retornou " . json_encode($resultado) . ", esperado " . json_encode($esperado) . "\n");
        $this->assertEquals($esperado, $resultado);
    }

    public static function validWithdrawalsProvider(): array
    {
        return [
            [150, [5, 50, 100], [100 => 1, 50 => 1]],
            [150, [2, 5, 10], [10 => 15]],
            [100, [2, 5, 50], [50 => 2]],
        ];
    }

    /**
     * Testa arrays inválidos (com cédulas não inteiras ou valores negativos).
     */
    #[DataProvider('invalidWithdrawalsProvider')]
    public function testInvalidWithdrawals(int $valor, array $cedulas): void
    {
        $this->expectException(InvalidArgumentException::class);  
        AtmMachine::withdraw($valor, $cedulas);
    }

    public static function invalidWithdrawalsProvider(): array
    {
        return [
            [150, []],
            [150, [0]],
            [150, [-1, 50]],
            [150, [1, "2", 50]],
        ];
    }
}