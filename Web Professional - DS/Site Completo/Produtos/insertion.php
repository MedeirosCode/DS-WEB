<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script>
            alert('Está faltando o método POST');
            window.location.href = 'produtos.php';
          </script>";
    exit;
}

$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$estoque = $_POST['estoque'];
$preco = $_POST['preco'];

if (!$nome || !$codigo || !$estoque || !$preco) {
    echo "<script>
            alert('Todos os campos são obrigatórios.');
            window.location.href = 'produtos.php';
          </script>";
    exit;
}

include "conexao.php";

try {
    $statement = $db->prepare("
        INSERT INTO produtos (nome, codigo, estoque, preco) 
        VALUES (:nome, :codigo, :estoque, :preco)
    ");

    $statement->bindParam(':nome', $nome);
    $statement->bindParam(':codigo', $codigo);
    $statement->bindParam(':estoque', $estoque);
    $statement->bindParam(':preco', $preco);

    $statement->execute();

    header("Location: produtos.php");
    exit;

} catch (PDOException $e) {
    echo "Erro ao inserir o produto: " . $e->getMessage();
}
?>
