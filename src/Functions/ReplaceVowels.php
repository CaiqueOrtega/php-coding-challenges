<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

use InvalidArgumentException;

/**
 * The function must replace all the vowels with '?' and return the result string
 * Ex: input: 'Foo' - output: 'F??'
 *
 * A função deverá receber uma string e substituir todas as vogais da mesma pelo sinal '?'
 * Ex: input: 'Bar' - output: 'B?r'
 *
 * @param string $string
 * @return string
 */
class ReplaceVowels
{
    public static function replace(string $string): string
    {
        if ($string === '') {
            throw new InvalidArgumentException('A string não pode estar vazia.');
        }

        if (!preg_match('/^[\p{L}\s]+$/u', $string)) {
            throw new InvalidArgumentException('A string deve conter apenas letras e espaços (sem números ou símbolos).');
        }

        return preg_replace('/[aeiouáéíóúãõâêîôûàèìòùäëïöü]/iu', '?', $string);
    }
}
