<?php

//incluindo a minha conexão com o banco de dados
include_once('conexao.php');


$nome = $_POST['nome'];
$preco = $_POST['valor'];
$descricao = $_POST['descricao'];
//inicio a inserção dos dados no banco
$sql = "INSERT INTO utilitarios (nome, descricao, preco) VALUES ('$nome', '$descricao',$preco)";
//mysquli_query = consulta 
if (mysqli_query($conexao, $sql)) {
echo "Novo registro inserido com sucesso!";
header('location: login.php');
} else {
echo "Erro ao inserir: " . mysqli_error($conexao);
}

?>