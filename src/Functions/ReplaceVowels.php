<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

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
    public static function replace($string): ?string
    {
        if (!is_string($string) || $string === '') {
            echo "Erro: O parâmetro fornecido não é uma string válida.\n";
            return null;
        }

        return preg_replace('/[aeiouáéíóúãõâêîôûàèìòùäëïöü]/iu', '?', $string);
    }
}