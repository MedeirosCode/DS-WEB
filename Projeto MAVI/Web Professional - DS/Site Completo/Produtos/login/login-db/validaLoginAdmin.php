<?php
/*
session_start();
include 'connection.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta o banco buscando o email informado
$sql = $db->prepare("SELECT * FROM administrador WHERE email = ?");
$sql->execute([$email]);

if ($sql->rowCount() > 0) {
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    // Verifica se a senha confere
    if ($usuario['senha'] === $senha) {
        // Login válido → salva dados na sessão
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];

        // Redireciona para o dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Senha errada
        echo "<script>alert('Senha incorreta'); window.location.href='login.php';</script>";
    }
} else {
    // Email não encontrado
    echo "<script>alert('E-mail não encontrado'); window.location.href='login.php';</script>";
}
?>

<link rel="icon" href="./assets/img/dogg.ico" type="image/x-icon">