<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $stmt = $pdo->prepare("INSERT INTO clientes (nome) VALUES (?)");
    $stmt->execute([$nome]);
    header("Location: principal.php");
}
?>
<link rel="stylesheet" href="style.css">
<form method="post">
    <input type="text" name="nome" placeholder="Nome do Cliente" required>
    <button type="submit">Adicionar</button>
</form>