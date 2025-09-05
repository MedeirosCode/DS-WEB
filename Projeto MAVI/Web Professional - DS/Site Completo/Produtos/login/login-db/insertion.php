<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script>
            alert('Está faltando o método POST');
            window.location.href = 'dashboard.php';
          </script>";
    exit;
}

$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if (!$nome || !$email || !$senha) {
    echo "<script>
            alert('Todos os campos são obrigatórios.');
            window.location.href = 'dashboard.php';
          </script>";
    exit;
}

include "connection.php";

try {
    $statement = $db->prepare("
        INSERT INTO administrador (nome, cargo, email, senha) 
        VALUES (:nome, :cargo, :email, :senha)
    ");

    $statement->bindParam(':nome', $nome);
    $statement->bindParam(':cargo', $cargo);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':senha', $senha);

    $statement->execute();

    header("Location: dashboard.php");
    exit;

} catch (PDOException $e) {
    echo "Erro ao inserir o produto: " . $e->getMessage();
}
?>
