<?php

include_once('conection.php');

// Preparando a inserção de novos dados
$statement = $db->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
$nome = $_POST['nome'];
$email = $_POST['email'];

// Executando a inserção
$statement->execute(array($nome, $email));

// Após a execução, consulta todos os dados dos clientes
$dados = $db->query("SELECT * FROM clientes");
$todos = $dados->fetchAll(PDO::FETCH_ASSOC); // Pega todos os resultados

// Agora percorre todos os clientes e exibe os dados
foreach ($todos as $linha) {
    echo "ID: " . $linha['id'] . "<br>";
    echo "Nome: " . $linha['nome'] . "<br>";
    echo "Email: " . $linha['email'] . "<br><br>";
}

// Após a execução, redireciona para o 'index.php' após 2 segundos
header('Location: index.php');
exit; // Importante para garantir que o script pare de rodar após o redirecionamento
?>

