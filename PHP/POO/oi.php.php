<?php

class Garrafa {
    public $cor;
    public $marca;
    public $preco;

    public function armazenarBebidas() {
        // Implementação
    }
    
    public function manterTemperaturas() {
        // Implementação
    }
    
    public function praticidade() {
        // Implementação
    }
}

class Eletronicos {
    public $pecas;
    public $marca;
    public $modelo;

    public function informacoesGraficas() {
        // Implementação
    }
    
    public function processarInformacoes() {
        // Implementação
    }
    
    public function rapidez() {
        // Implementação
    }
}

class Moveis {
    public $cor;
    public $marca;
    public $preco;

    public function guardarRoupas() {
        // Implementação
    }
    
    public function protegerRoupas() {
        // Implementação
    }
    
    public function organizacao() {
        // Implementação
    }
}

class Dormitorio {
    public $materias;
    public $comprimento;
    public $largura;

    public function conforto() {
        // Implementação
    }
    
    public function suporteColchao() {
        // Implementação
    }
    
    public function evitarSujeiras() {
        // Implementação
    }
}

class Musculacao {
    public $halteres;
    public $marca;
    public $preco;

    public function saude() {
        // Implementação
    }
    
    public function massaMuscular() {
        // Implementação
    }
    
    public function hipertrofia() {
        // Implementação
    }
}

class ContaBancaria {
    public $saldo;
    public $titular;
    public $numeroDaConta;

    public function exibirSaldo() {
        return "O saldo é R$ " . $this->saldo;
    }

    public function depositar($deposito) {
        $this->saldo += $deposito;
        return "Este é o novo saldo: R$ " . $this->saldo;
    }

    public function retirar($saque) {
        $this->saldo -= $saque;
        return "Este é o novo saldo: R$ " . $this->saldo;
    }
}

$contaMedeiros = new ContaBancaria();
$contaMedeiros->saldo = 1000000000000000;
$contaMedeiros->numeroDaConta = 1234554;
$contaMedeiros->titular = "Vinicius Medeiros";

echo "Titular da conta: " . $contaMedeiros->titular;
echo "<br>";
echo "Saldo: " . $contaMedeiros->exibirSaldo();
echo "<br>";
echo $contaMedeiros->retirar(20);

$contaLeonardoDaVinci = new ContaBancaria();
$contaLeonardoDaVinci->saldo = 10.0;
$contaLeonardoDaVinci->numeroDaConta = 123456789;
$contaLeonardoDaVinci->titular = "Leonardo da Vinci";

$contaSteveRogers = new ContaBancaria();
$contaSteveRogers->saldo = 600000;
$contaSteveRogers->numeroDaConta = 45983405694;
$contaSteveRogers->titular = "Steve Rogers";

?>
