<?php
declare(strict_types=1);

namespace Caique\PhpCodingChallenges\Functions;

    use InvalidArgumentException;
    use RuntimeException;

    /**
     * The function should work like an ATM machine. it will recive an integer value representing the amount that will be withdrown and an array containing the avaliable bank notes.
     * Your function will have to return an array informing the minimum amount of bank notes as possible for the withdrown. Consider that the amount of each note are infinity.
     *
     * A função será utilizada em um sistema de caixa.
     * Ela receberá um valor inteiro, representando o valor a ser sacado e um array contendo quais tipos de cédulas ela tem disponível.
     * O array de cédulas disponiveis indica quais valores de cédulas existirão no caixa, a quantidade das mesmas é ilimitada. No caso do input [2,5,50], o caixa terá quantidades ilimitadas de notas de 2, 5 e 50 para devolver ao cliente.
     * A função deverá retornar o mínimo de cédulas necessarias possivel para o saque em formato de um array, cuja chave seja o valor da cédula e o valor a quantidade daquela cédula que será sacada.
     *
     * Ex: input: 150 & [5, 50, 100] 	- output: ["100"=>1, "50"=>1].
     * Ex: input: 150 e [2, 5, 10] 		- output: ["10"=>15].
     *
     * @param int   $valor
     * @param array $cedulas
     *
     * @return array
     */
    class AtmMachine
    {
        public static function withdraw(int $valor, array $cedulas): array
        {
            if ($valor <= 0) {
                throw new InvalidArgumentException("O valor solicitado deve ser maior que zero.");
            }

            if (empty($cedulas)) {
                throw new InvalidArgumentException("O array de cédulas não pode estar vazio.");
            }

            foreach ($cedulas as $nota) {
                if (!is_int($nota) || $nota <= 0) {
                    throw new InvalidArgumentException("Todas as cédulas devem ser números inteiros positivos.");
                }
            }

            rsort($cedulas);

            $resultado = [];

            foreach ($cedulas as $nota) {
                if ($valor >= $nota) {
                    $quantidade = intdiv($valor, $nota);
                    $resultado[$nota] = $quantidade;
                    $valor -= $quantidade * $nota;
                    if ($valor === 0) {
                        break;
                    }
                }
            }

            if ($valor > 0) {
                throw new RuntimeException("Não é possível sacar o valor solicitado com as cédulas disponíveis.");
            }

            return $resultado;
        }
    }