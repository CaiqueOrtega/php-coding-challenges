<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

/**
 * The function should expect a string and return it backwards.
 * Ex: input: "foo" - output: "oof"
 *
 * A função deverá receber uma string e retornar a mesma invertida.
 * Ex: input: "bar" - output: "rab"
 *
 * @param string $string
 * @return string
 */
class ReverseString
{
    public static function reverse($string): ?string
    {
        if (!is_string($string) || $string === '') {
            echo "Erro: O parâmetro fornecido não é uma string válida ou é uma string vazia.\n";
            return null;
        }

        return strrev($string);
    }
}