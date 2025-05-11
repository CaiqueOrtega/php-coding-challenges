<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

/**
 * The function should receive an integer between 1 and 12 (inclusive) and return the corresponding string value. If the informed integger is not between 1 and 12, the function should return 'Unknown Month'
 * Ex: input: 1 - output: "January"
 * Ex: input: 13 - output: "Unknown Month"
 *
 * A função recebe um inteiro entre 1 e 12 e retorna o mês correspondente por extenso. Caso o mês informado não esteja entre 1 e 12, deverá ser retornado "Mes Inexistente"
 * Ex: input: 1 	- output: "Janeiro"
 * Ex: input: 13 	- output: "Mês Desconhecido"
 *
 * @param int $month
 * @return string
 */
class CorrespondingMonth
{
    private const MONTHS = [
        1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
        5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
        9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
    ];

    public static function get(int $month): string
    {
        return self::MONTHS[$month] ?? 'Mês Desconhecido';
    }
}
