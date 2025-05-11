<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\TestCase;
use Caique\PhpCodingChallenges\Functions\CreditCardNumber;

class CreditCardNumberTest extends TestCase
{
    /**
     * Testa se a função gera um número de cartão válido:
     * - Formato correto: começa com 543210 e termina com 1234, com 6 dígitos centrais.
     * - Múltiplo de 123457.
     * - Passa no algoritmo de Luhn.
     */
    public function testCardGeneration(): void
    {
        $cardNumber = CreditCardNumber::generate();
        fwrite(STDOUT, "Número de cartão gerado: {$cardNumber}\n");

        $this->assertMatchesRegularExpression('/^543210\d{6}1234$/', $cardNumber, 'Formato inválido');

        $this->assertEquals(0, (int)$cardNumber % 123457, 'Não é múltiplo de 123457');

        $this->assertTrue($this->passesLuhn($cardNumber), 'Falhou no algoritmo de Luhn');
    }
    
    /**
     * Valida um número de cartão usando o algoritmo de Luhn.
     */
    private function passesLuhn(string $number): bool
    {
        $sum = 0;
        $alt = false;

        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $n = (int)$number[$i];
            if ($alt) {
                $n *= 2;
                if ($n > 9) $n -= 9;
            }
            $sum += $n;
            $alt = !$alt;
        }

        return $sum % 10 === 0;
    }
}
