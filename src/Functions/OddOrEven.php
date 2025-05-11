<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

/**
 * The function should expect an array containing integers greater than zero and return the amount of even values contained in it.
 * Ex: input: [1,2,3,4,5] - output: 2
 *
 * Recebe um array de inteiros maiores que zero e retorna a quantidade de números pares existentes no array
 * Ex: input: [1,2,3,4,5] - output: 2
 *
 * @param array $array
 * @return int
 */
class OddOrEven
{
    public static function count(array $array): ?int
    {
        if (empty($array) || !array_reduce($array, fn($carry, $item) => $carry && is_int($item) && $item > 0, true)) {
            echo "Erro: Todos os elementos do array devem ser inteiros maiores que zero.\n";
            return null;
        }

        $evenNumbers = array_filter($array, fn($num) => $num % 2 === 0);
        return count($evenNumbers);
    }
}