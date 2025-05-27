<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
    $stmt->execute([$nome, $preco]);
    header("Location: principal.php");
}
?>
<link rel="stylesheet" href="style.css">
<form method="post">
    <input type="text" name="nome" placeholder="Nome do Produto" required>
    <input type="number" step="0.01" name="preco" placeholder="Preço" required>
    <button type="submit">Adicionar</button>
</form>