<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

/**
 * The function must expect an array of integers and return the first non-repeated value.
 * Ex: input: [2,2,3,1,1,6] - output: 3
 *
 * A função irá receber um array de inteiros e retornar o primeiro elemento não repetido.
 * Ex: input: [2,2,3,1,1,6] - output: 3
 *
 * @param array $array - Array contendo inteiros
 * @return int
 */
class FirstNonRepeatedValue
{
    public static function find(array $array): int|null
    {
        if (empty($array) || !array_reduce($array, fn($carry, $item) => $carry && is_int($item), true)) {
            echo "Erro: Todos os elementos do array devem ser inteiros.\n";
            return null;
        }

        $counts = array_count_values($array);
        foreach ($array as $value) {
            if ($counts[$value] === 1) {
                return $value;
            }
        }
        return null;
    }
}
