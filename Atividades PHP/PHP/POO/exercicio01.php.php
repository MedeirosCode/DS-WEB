<?php

// Criando a classe pessoas
class Pessoas {
    public $nome;
    protected $idade;
}

// Extendo a classe (herança) funcionarios
class Funcionario extends Pessoas {
    protected $salario = 2000;
}

// Extende a classe Funcionario adicionando Gerente
class Gerente extends Funcionario {
    public function calcularbonus(): float {
        return $this->salario * 0.2;
    }
}

// Extende a classe Funcionario adicionando Desenvolvedor
class Desenvolvedor extends Funcionario {
    public function calcularbonus(): float {
        return $this->salario * 0.1;
    }
}

$gerente = new Gerente();
echo "Bônus do Gerente: " . $gerente->calcularbonus();
echo "<br>"

$desenvolvedor = new Desenvolvedor();
echo "Bônus do Desenvolvedor: " . $desenvolvedor->calcularbonus();
echo "<br>"

?>
