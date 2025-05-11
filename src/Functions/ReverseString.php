<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

use InvalidArgumentException;

/**
 * The function should expect a string and return it backwards.
 * Ex: input: "foo" - output: "oof"
 *
 * A função deverá receber uma string e retornar a mesma invertida.
 * Ex: input: "bar" - output: "rab"
 *
 * Obs: A inversão foi implementada manualmente ao invés de usar `strrev`, 
 * com o objetivo de priorizar a lógica e demonstrar controle sobre o fluxo da string.
 *
 * @param string $string
 * @return string
 */
class ReverseString
{
    public static function reverse(string $string): string
    {
        if ($string === '') {
            throw new InvalidArgumentException('A string não pode estar vazia.');
        }

        $reversed = '';
        $length = mb_strlen($string);

        for ($i = $length - 1; $i >= 0; $i--) {
            $reversed .= mb_substr($string, $i, 1);
        }

        return $reversed;
    }
}
