<?php

//incluindo a minha conexão com o banco de dados
include_once('conection.php');


$nome = $_POST['nome'];
$valor = $_POST['valor'];
$estoque = $_POST['estoque'];
//inicio a inserção dos dados no banco
$sql = "INSERT INTO produtos (nome, valor , estoque) VALUES ('$nome', '$valor', '$estoque')";
//mysquli_query = consulta 
if (mysqli_query($conexao, $sql)) {
echo "Novo registro inserido com sucesso!";
header('location: index.php');
} else {
echo "Erro ao inserir: " . mysqli_error($conexao);
}

?>