<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script>
            alert('Está faltando o método POST');
            window.location.href = 'produtos.php';
          </script>";
    exit;
}

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$estoque = $_POST['estoque'];
$codigo = $_POST['codigo'];

if (!$nome || !$valor || !$estoque || !$codigo) {
    echo "<script>
            alert('Todos os campos são obrigatórios.');
            window.location.href = 'produtos.php';
          </script>";
    exit;
}

include "conexao.php";

try {
    $statement = $db->prepare("
        INSERT INTO produtos (nome, valor, estoque, codigo) 
        VALUES (:nome, :valor, :estoque, :codigo)
    ");

    $statement->bindParam(':nome', $nome);
    $statement->bindParam(':valor', $valor);
    $statement->bindParam(':estoque', $estoque);
    $statement->bindParam(':codigo', $codigo);

    $statement->execute();

    header("Location: produtos.php");
    exit;

} catch (PDOException $e) {
    echo "Erro ao inserir o produto: " . $e->getMessage();
}
?>
