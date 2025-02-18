<?php
class Documento {
    private $numero;

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
}

class CPF extends Documento {
    public function validar() {
        $cpf = preg_replace('/[^0-9]/', '', $this->getNumero()); // Remove caracteres não numéricos

        if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false; // Verifica se tem 11 dígitos e se não é uma sequência repetida
        }

        // Cálculo dos dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($i = 0; $i < $t; $i++) {
                $soma += $cpf[$i] * (($t + 1) - $i);
            }
            $digito = ($soma * 10) % 11;
            if ($digito == 10) {
                $digito = 0;
            }
            if ($cpf[$t] != $digito) {
                return false;
            }
        }
        return true;
    }
}

// Criando um objeto de CPF e testando a validação
$cpf = new CPF();
$cpf->setNumero("123.456.789-09");

echo "CPF: " . $cpf->getNumero() . " - " . ($cpf->validar() ? "Válido" : "Inválido");
?>
