# 🚀 PHP Coding Challenges

Este repositório contém uma série de funções implementadas em PHP, seguidas de testes automatizados com PHPUnit. O objetivo do projeto é demonstrar boas práticas de programação, como o uso de funções bem definidas e testes automatizados, com a execução simplificada através do Composer.

<br />

## 🛠️ Instalação

   ```bash
   # Abra o terminal e execute os seguintes comandos:

   # Clone o repositório
   git clone https://github.com/CaiqueOrtega/php-coding-challenges

   # Entre na pasta do projeto
   cd php-coding-challenges

   # Instale as dependências
   composer install

   # Execute os testes
   composer test

   ```
> ⚠️ Pré-requisitos: `PHP** 7.4+`, `Composer`, `PHPUnit (instalado via Composer)`.

<br />

## 📝 Desafios Implementados

| #  | Desafio                                               | Descrição                                                                               | Exemplo de Entrada   | Exemplo de Saída       |
| -- | ----------------------------------------------------- | --------------------------------------------------------------------------------------- | -------------------- | ---------------------- |
| 1  | **`correspondingMonth(int $month): string`**          | Converte o número de mês (1-12) para o nome correspondente.                             | `1`                  | "January" ou "Janeiro" |
| 2  | **`arithmeticAverage(array $integers)`**              | Calcula a média aritmética de um array com pelo menos 3 itens.                          | `[4, 6, 8]`          | `6`                    |
| 3  | **`oddOrEven(int $number): bool`**                    | Verifica se o número é ímpar ou par.                                                    | `4`                  | `true` (par)           |
| 4  | **`reverseString(string $string): string`**           | Retorna a string invertida.                                                             | `"foo"`              | `"oof"`                |
| 5  | **`replaceWowels(string $string): string`**           | Substitui todas as vogais por "?" em uma string.                                        | `"Foo"`              | `"F??"`                |
| 6  | **`sortArray(array $array): array`**                  | Ordena um array de inteiros em ordem crescente.                                         | `[5, 1, 0, 7, 3, 3]` | `[0, 1, 3, 3, 5, 7]`   |
| 7  | **`firstNonRepeatedValue(array $array): int`**        | Retorna o primeiro valor não repetido de um array de inteiros.                          | `[2, 2, 3, 1, 1, 6]` | `3`                    |
| 8  | **`fileHandler(): int`**                              | Lê `data.dat` e conta linhas com condições específicas sobre 0's e 1's.                 | N/A                  | `3`                    |
| 9  | **`creditCardNumber(): string`**                      | Gera um número de cartão de crédito válido com padrão específico e verificação de Luhn. | N/A                  | `"543210******1234"`   |
| 10 | **`atmMachine(int $value, array $bankNotes): array`** | Calcula o número mínimo de cédulas necessárias para um saque.                           | `150`, `[2, 5, 50]`  | `["100"=>1, "50"=>1]`  |

<br />

## 📂 Estrutura do Projeto

    ├── src                    # Diretório principal do código-fonte
    │   ├── Data               # Arquivo que contém a lógica de leitura e processamento do arquivo data.dat
    │   └── Functions          # Pasta para implementação das funções (ex: lógica de negócios, cálculos)
    └── Tests                  # Diretório para os testes 
    
<br />

## 👨‍💻 Explicação Rápida sobre OOP.

* **Classes**: Modelos que definem propriedades e comportamentos de objetos.
* **Objetos**: Instâncias de classes, representando entidades com estado e comportamento.
* **Instâncias**: Objetos criados a partir de uma classe.
* **Interfaces**: Contratos que classes podem implementar para garantir que possuam métodos específicos.

<br />

## 👨‍💻 Desenvolvedor

<table>
  <tr>
    <td align="center">
      <img src="https://github.com/caiqueortega.png?size=100" width="100">
    </td>
    <td>
      <strong>Caique Ortega</strong><br />
      <i>Desenvolvedor Full Stack</i><br />
    </td>
    <td>
      <a href="https://github.com/caiqueortega">
        <img src="https://img.shields.io/badge/GitHub-000?style=for-the-badge&logo=github&logoColor=white" />
      </a><br>
      <a href="https://www.linkedin.com/in/caiqueortega">
        <img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white" />
      </a>
    </td>
  </tr>
</table>
