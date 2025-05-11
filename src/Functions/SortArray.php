<?php

namespace Caique\PhpCodingChallenges\Functions;

/**
 * The function must expect an array of integers and sort it in ascending order
 * Ex: Input: [5,1,0,7,3,3] - Output: [0,1,3,3,5,7]
 *
 * A função deverá receber um array de inteiros como parâmetro e deverá retornar o mesmo array ordenado em ordem crescente.
 * Ex: Input: [5,1,0,7,3,3] - Output: [0,1,3,3,5,7]
 *
 * @param array $array - Array a ser ordenado
 * @return array
 */
class SortArray
{
    public static function sortAscending(array $array): array|false
    {
        if (count($array) <= 1) {
            echo "Erro: O array deve conter mais de um item para ser ordenado.\n";
            return false;
        }

        if (!array_reduce($array, fn($carry, $item) => $carry && is_int($item), true)) {
            echo "Erro: Todos os itens do array devem ser inteiros.\n";
            return false;
        }

        sort($array);
        return $array;
    }
}