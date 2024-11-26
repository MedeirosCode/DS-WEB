<?php

// Array bidimensional
$produtos = array(
    array('preco' => 160, 'nome' => 'Whey protein', 'estoque' => 56),
    array('preco' => 60, 'nome' => 'Creatina', 'estoque' => 60),
    array('preco' => 100, 'nome' => 'Pre-treino', 'estoque' => 54)
);

// Exibindo os produtos e multiplicando os valores
foreach ($produtos as $produto) {
    $nome = $produto['nome'];
    $preco = $produto['preco'];
    $estoque = $produto['estoque'];
    $multiplicacao = $preco * $estoque;

    echo "Nome: $nome | Preço: R$$preco | Estoque: $estoque | Multiplicação (Preço x Estoque): R$$multiplicacao<br>";
}

$alunos = array(
    array('cpf' => 'Ana', 'matematica' => 8, 'portugues' => 7),
    array('cpf' => 'Bruno', 'matematica' => 6, 'portugues' => 9),
    array('cpf' => 'Carlos', 'matematica' => 7, 'portugues' => 8)
);

foreach ($alunos as $aluno) {
    $cpf = $aluno['cpf'];
    $matematica = $aluno['matematica'];
    $portugues = $aluno['portugues'];
    
    
    $soma = $matematica + $portugues;
    
   
    $media = $soma / 2;

    echo "Aluno: $cpf<br>";
    echo "Soma: $soma<br>";
    echo "Média: $media<br><br>";
}
?>

    
