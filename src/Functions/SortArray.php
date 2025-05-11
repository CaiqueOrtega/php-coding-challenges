<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

use InvalidArgumentException;

/**
 * The function must expect an array of integers and sort it in ascending order.
 * Ex: Input: [5,1,0,7,3,3] - Output: [0,1,3,3,5,7]
 *
 * A função deverá receber um array de inteiros como parâmetro e deverá retornar o mesmo array ordenado em ordem crescente.
 * Ex: Input: [5,1,0,7,3,3] - Output: [0,1,3,3,5,7]
 *
 * Obs: A ordenação foi implementada manualmente com Bubble Sort em vez da função nativa `sort()`,
 * para priorizar a lógica e demonstrar controle sobre o algoritmo.
 *
 * @param array $array - Array a ser ordenado
 * @return array
 */
class SortArray
{
    public static function sortAscending(array $array): array
    {
        if (count($array) <= 1) {
            throw new InvalidArgumentException('O array deve conter ao menos dois elementos para ser ordenado.');
        }

        if (!array_reduce($array, fn($carry, $item) => $carry && is_int($item), true)) {
            throw new InvalidArgumentException('Todos os itens do array devem ser inteiros.');
        }

        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    [$array[$j], $array[$j + 1]] = [$array[$j + 1], $array[$j]];
                }
            }
        }

        return $array;
    }
}
