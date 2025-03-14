<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo "<script>
                alert('Está faltando o método POST');
                window.location.href = 'clientes.php';
              </script>";
        exit;
    }
   
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $observacao = $_POST['observacao'];
    

    if (!$id || !$nome || !$email || !$observacao) {
        echo "<script>
                alert('Todos os campos são obrigatórios.');
                window.location.href = 'clientes.php';
              </script>";
        exit;
    }

    include "conexaoCliente.php";

    try {
        $statement = $db->prepare("
            UPDATE clientes 
            SET nome = :nome, email = :email, observacao = :observacao
            WHERE id = :id
        ");

        $statement->bindParam(':nome', $nome);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':observacao', $observacao);
       
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        header("Location: clientes.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao atualizar o produto: " . $e->getMessage();
    }
?>