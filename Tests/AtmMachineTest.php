<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Caique\PhpCodingChallenges\Functions\AtmMachine;
use InvalidArgumentException;
use RuntimeException;

class AtmMachineTest extends TestCase
{
    /**
     * Testa saques válidos e verifica se o resultado corresponde ao esperado.
     */
    #[DataProvider('validWithdrawProvider')]
    public function testValidWithdrawals(int $amount, array $notes, array $expected): void
    {
        $result = AtmMachine::withdraw($amount, $notes);
        $this->assertEquals($expected, $result);
    }

    /**
     * Fornece casos de teste válidos de saque.
     * Cada item representa: valor a sacar, notas disponíveis, e resultado esperado (com o mínimo de cédulas).
     */
    public static function validWithdrawProvider(): array
    {
        return [
            'Withdraw 150 with notes [5, 50, 100] -> Expected: [100 => 1, 50 => 1]' => [150, [5, 50, 100], [100 => 1, 50 => 1]],
            'Withdraw 150 with notes [2, 5, 10] -> Expected: [10 => 15]' => [150, [2, 5, 10], [10 => 15]],
            'Withdraw 100 with notes [10, 20, 50] -> Expected: [50 => 2]' => [100, [10, 20, 50], [50 => 2]],
            'Withdraw 200 with notes [10, 20, 50] -> Expected: [50 => 4]' => [200, [10, 20, 50], [50 => 4]],
        ];
    }

    /**
     * Testa saques inválidos que devem lançar exceções.
     */
    #[DataProvider('invalidWithdrawProvider')]
    public function testInvalidWithdrawals(int $amount, array $notes): void
    {
        $this->expectException(InvalidArgumentException::class);
        AtmMachine::withdraw($amount, $notes);
    }

    /**
     * Fornece casos de erro onde o valor ou as notas são inválidos.
     */
    public static function invalidWithdrawProvider(): array
    {
        return [
            'Negative amount -> Expected exception' => [-50, [10, 20]],
            'Zero amount -> Expected exception' => [0, [10, 20]],
            'Empty notes array -> Expected exception' => [50, []],
            'Non-integer note -> Expected exception' => [50, [10, '20']],
            'Negative note value -> Expected exception' => [50, [10, -20]],
        ];
    }

    /**
     * Testa um caso onde o valor solicitado não pode ser sacado com as notas disponíveis.
     */
    public function testImpossibleWithdrawal(): void
    {
        $this->expectException(RuntimeException::class);
        AtmMachine::withdraw(75, [50, 20]);
    }
}
