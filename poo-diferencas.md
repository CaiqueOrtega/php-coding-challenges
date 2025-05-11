# Diferenças entre Classe, Objeto, Instância e Interface

## 📦 Classe
Uma **classe** é um molde ou estrutura que define atributos (propriedades) e comportamentos (métodos) de um tipo de objeto. Ela representa um conceito abstrato que ainda não existe na prática até ser instanciada.

> Exemplo: a classe `Carro` pode definir que todo carro tem `cor`, `modelo` e um método `acelerar()`.

---

## 🧱 Objeto
Um **objeto** é uma entidade concreta criada a partir de uma classe. Ele é uma **instância viva** de uma classe, com valores reais atribuídos aos atributos e a capacidade de executar os métodos definidos na classe.

> Exemplo: `$meuCarro = new Carro("vermelho", "Fusca");` cria um objeto baseado na classe `Carro`.

---

## 🧬 Instância
Uma **instância** é o ato ou resultado de criar um objeto a partir de uma classe. Em outras palavras, **instância e objeto são praticamente sinônimos**, mas o termo "instância" enfatiza o processo de criação.

> Exemplo: "Instanciar a classe `Carro`" significa criar um objeto dessa classe.

---

## 🎛️ Interface
Uma **interface** define **um contrato** que uma classe deve seguir. Ela declara quais métodos uma classe deve implementar, mas **não fornece a implementação dos métodos**.

> Exemplo: a interface `Veiculo` pode declarar os métodos `acelerar()` e `frear()`. Qualquer classe que implementar `Veiculo` deve obrigatoriamente definir esses métodos.

---

