<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo "<script>
                alert('Está faltando o método POST');
                window.location.href = 'produtos.php';
              </script>";
        exit;
    }
   
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $estoque = $_POST['estoque'];
    $codigo = $_POST['codigo'] ;

    if (!$id || !$nome || !$valor || !$estoque || !$codigo) {
        echo "<script>
                alert('Todos os campos são obrigatórios.');
                window.location.href = 'produtos.php';
              </script>";
        exit;
    }

    include "conexao.php";

    try {
        $statement = $db->prepare("
            UPDATE produtos 
            SET nome = :nome, valor = :valor, estoque = :estoque, codigo = :codigo
            WHERE id = :id
        ");

        $statement->bindParam(':nome', $nome);
        $statement->bindParam(':valor', $valor);
        $statement->bindParam(':estoque', $estoque);
        $statement->bindParam(':codigo', $codigo);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        header("Location: produtos.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao atualizar o produto: " . $e->getMessage();
    }
?>