<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

/**
 * The function must return the full credit card number. The card number is a multiple of 123457 and the Luhn check digit is valid.
 * The Card Number must have the following pattern: 543210******1234
 *
 * Descubra o número do cartão de crédito abaixo sabendo que o mesmo é um multiplo de 123457 e o digito de luhn é válido.
 * O Número do cartão deve ter o seguinte padrão: 543210******1234
 *
 * @return string
 */
class CreditCardNumber
{
    public static function generate(): string
    {
        $prefix = '543210';
        $suffix = '1234';

        $start = 0;
        $end = 999999;

        foreach (range($start, $end) as $middle) {
            $middleStr = str_pad((string)$middle, 6, '0', STR_PAD_LEFT);
            $cardNumber = $prefix . $middleStr . $suffix;

            if ((int)$cardNumber % 123457 === 0 && self::passesLuhn($cardNumber)) {
                return $cardNumber;
            }
        }

        throw new \RuntimeException('Valid credit card not found.');
    }

    private static function passesLuhn(string $number): bool
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
