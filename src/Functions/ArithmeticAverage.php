<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

use InvalidArgumentException;

/**
 * The function should receive an array with at least 3 itens and return the arithmetic average of all the itens.
 * If the received array contains less then 3 itens, the function should return the boolean false.
 * Ex: input: [4,6,8] 	- output 6
 * Ex: input: [1,2] 	- output false
 *
 * A função deverá receber um array com pelo menos 3 itens e retornar a média simples de todos os itens do array.
 * Caso o array recebido possua menos que 3 itens, deverá ser retornado o boleano false.
 * Ex: input: [4,6,8] 	- output 6
 * Ex: input: [1,2] 	- output false
 *
 * @param array $notas
 * @return int|bool
 */
class ArithmeticAverage
{
    public static function calculate(array $integers): int|false
    {
        try {
            if (count($integers) < 3) {
                throw new InvalidArgumentException('Array deve ter pelo menos 3 itens.');
            }

            foreach ($integers as $item) {
                if (!is_int($item)) {
                    throw new InvalidArgumentException('Todos os itens do array devem ser inteiros.');
                }
            }

            $avg = array_sum($integers) / count($integers);
            return (int) round($avg);
        } catch (InvalidArgumentException $e) {
            return false;
        }
    }
}
