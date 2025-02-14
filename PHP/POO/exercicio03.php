<?php

class Veiculo {
    public $marca = "BMW";
    public $modelo = "M4";
    private $velocidade = "300km";




    public function getVelocidade() {
        return $this->velocidade;
    }



    public function setVelocidade($velocidade) {
        $this->velocidade = $velocidade;
    }



    public function exibirInformacoes() {
        echo "Marca: " . $this->marca . "\n";
        echo "Modelo: " . $this->modelo . "\n";
        echo "Velocidade: " . $this->velocidade . "\n";
    }
}






class Carro extends Veiculo {
    public function Acelerar() {
        return "Acelerar em 5km\n";
    }
}




class Moto extends Veiculo {
    public function Acelerar() {
        return "Acelerar em 10km\n";
    }
}





$carro = new Carro();
$moto = new Moto();




echo "Carro:\n";
$carro->exibirInformacoes();
echo $carro->Acelerar();

echo "\nMoto:\n";
$moto->exibirInformacoes();
echo $moto->Acelerar();

?>