<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Caique\PhpCodingChallenges\Functions\CreditCardNumber;

class CreditCardNumberTest extends TestCase
{
    /**
     * Testa a geração do número do cartão de crédito.
     * Verifica se o número gerado segue o padrão esperado, se é múltiplo de 123457 e se passa na verificação de Luhn.
     */
    #[DataProvider('validCreditCardProvider')]
    public function testGenerateCreditCardNumber(string $cardNumber): void
    {
        $this->assertMatchesRegularExpression('/^543210\d{6}1234$/', $cardNumber, "O número do cartão gerado não segue o padrão esperado.");

        $this->assertTrue(
            (int)$cardNumber % 123457 === 0,
            "O número do cartão gerado não é múltiplo de 123457. Valor: $cardNumber"
        );

        $this->assertTrue(
            CreditCardNumber::passesLuhn($cardNumber),
            "O número do cartão gerado não passou na verificação de Luhn. Valor: $cardNumber"
        );
    }
    
    /**
     * Fornece casos de testes válidos para a geração de números de cartões de crédito.
     * Cada caso fornece o número de cartão gerado.
     */
    public static function validCreditCardProvider(): array
    {
        $cardNumber = CreditCardNumber::generate();

        return [
            "Cartão válido gerado: $cardNumber" => [$cardNumber]
        ];
    }
}
