
<?php

//incluindo a minha conexão com o banco de dados
include_once('conexao.php');


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//inicio a inserção dos dados no banco
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', $senha)";
//mysquli_query = consulta 
if (mysqli_query($conexao, $sql)) {
echo "Novo registro inserido com sucesso!";
header('location: login.php');
} else {
echo "Erro ao inserir: " . mysqli_error($conexao);
}

?>