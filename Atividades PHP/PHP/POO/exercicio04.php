<?php

class Produto {
    protected $preco = 15.00;
    protected $estoque = 4;
    protected $desconto = 1;

    public function getPrecoFinal() {
        $precoBase = $this->preco;
        if ($this->estoque < 5) {
            $precoBase *= 0.90;
        }
        return $precoBase * $this->desconto;
    }
}

class Eletronico extends Produto {
    protected $desconto = 0.90;
}

class Roupa extends Produto {
    protected $desconto = 0.80;
}

$eletronico = new Eletronico();
$roupa = new Roupa();

echo "Eletrônico: R$ ";
echo $eletronico->getPrecoFinal();
echo "\n";

echo "Roupa: R$ ";
echo $roupa->getPrecoFinal();
echo "\n";
?>
