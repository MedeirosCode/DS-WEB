<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script>
            alert('Está faltando o método POST');
            window.location.href = 'clientes.php';
          </script>";
    exit;
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$observacao = $_POST['observacao'];


if (!$nome || !$email) {
    echo "<script>
            alert('Todos os campos são obrigatórios.');
            window.location.href = 'clientes.php';
          </script>";
    exit;
}

include "conexaoCliente.php";

try {
    $statement = $db->prepare("
        INSERT INTO clientes (nome, email, observacao) 
        VALUES (:nome, :email, :observacao)
    ");

    $statement->bindParam(':nome', $nome);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':observacao', $observacao);
    

    $statement->execute();

    header("Location: clientes.php");
    exit;

} catch (PDOException $e) {
    echo "Erro ao inserir o produto: " . $e->getMessage();
}
?>
