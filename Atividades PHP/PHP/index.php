<?php

/* primeira etada do trabalho*/
$frutas = ["Maçã", "Banana", "Laranja", "Manga", "Abacaxi"];

foreach ($frutas as $fruta) {
    echo $fruta . "<br>";
}
/* segunda etapa do trabalho*/
$frutas[] = "Uva";
print_r($frutas );

/* 3 etapa do trabalho = orenado em ordem alfabética*/
sort($frutas);
print_r($frutas);

/* quarta etapa do processo = criado um array associativo que armazena informações*/
$produto = [
    "nome" => "Teclado",
    "preco" => 120.50,
    "estoque" => 15
];

foreach ($produto as $chave => $valor) {
    echo "$chave: $valor <br>";
}

/* quinta etapa do trabalho = adicionando um novo valor ao produto*/
$produto["preco"] = 150.00;

foreach ($produto as $chave => $valor) {
    echo "$chave: $valor <br>";
}

/* sexta etapa  calculando a venda de 5 unidades do produto*/
$unidades = 5;
$valor_total = $produto["preco"] * $unidades;
echo "Valor total da venda de $unidades unidades: R$ $valor_total<br>";

/* sétima etapa = juntado os dois arrays*/
$nomes = ["Teclado", "Mouse", "Monitor"];
$precos = [150.00, 80.00, 1200.00];

$produtos = array_combine($nomes, $precos);
print_r($produtos);

/* Oitava etapa do trabalho = verificando se um elemento exite*/
$cores = ["vermelho", "azul", "verde", "amarelo", "preto"];

/* Verifica se a cor "verde" está presente no array*/
if (in_array("verde", $cores)) {
    echo "A cor 'verde' está presente no array.<br>";
} else {
    echo "A cor 'verde' não está presente no array.<br>";
}

/*Nona etapa do trabalho = Somando e pegando a média*/
$numeros = [10, 20, 30, 40, 50];

$soma = array_sum($numeros);
$media = $soma / count($numeros);

echo "Soma: $soma<br>";
echo "Média: $media<br>";

?>
