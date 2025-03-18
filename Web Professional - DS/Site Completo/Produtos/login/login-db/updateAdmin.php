<?php  
session_start();
include 'connection.php';

// Verifica se o ID foi passado corretamente
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];

// Busca os dados do administrador no banco de dados
$stmt = $db->prepare("SELECT * FROM administrador WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o ID não existir, redireciona
if (!$dados) {
    echo "<script>alert('Administrador não encontrado!'); window.location.href='dashboard.php';</script>";
    exit();
}

// Define as variáveis para preencher o formulário
$nomeAdministrador = $dados['nome'];
$cargoAdministrador = $dados['cargo'];
$emailAdministrador = $dados['email'];
$senhaAdministrador = $dados['senha'];

// Processa o formulário de atualização
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoNome = $_POST['nome'];
    $novoCargo = $_POST['cargo'];
    $novoEmail = $_POST['email'];
    $novaSenha = $_POST['senha']; // Sem criptografia, conforme solicitado

    if (!empty($novoNome) && !empty($novoCargo) && !empty($novoEmail) && !empty($novaSenha)) {
        try {
            $updateStmt = $db->prepare("UPDATE administrador SET nome = :nome, cargo = :cargo, email = :email, senha = :senha WHERE id = :id");
            $updateStmt->bindParam(':nome', $novoNome);
            $updateStmt->bindParam(':cargo', $novoCargo);
            $updateStmt->bindParam(':email', $novoEmail);
            $updateStmt->bindParam(':senha', $novaSenha);
            $updateStmt->bindParam(':id', $id);
            $updateStmt->execute();

            echo "<script>
                    alert('Administrador atualizado com sucesso!');
                    window.location.href='dashboard.php';
                  </script>";
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao atualizar: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Todos os campos são obrigatórios!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Admins</title>
    <link rel="stylesheet" href="./assetsLogin/csslogin/styleUpdate.css">
    <link rel="icon" href="./assets/img/dogg.ico" type="image/x-icon">
</head>
<body>

    <div class="container">
        <div class="formulario">
            <h1>Editar Administrador</h1>
            <form action="" method="POST"> <!-- Mantém os dados na mesma página -->
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($nomeAdministrador); ?>" required>

                <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" value="<?= htmlspecialchars($cargoAdministrador); ?>" required>

                <label for="email">E-mail:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($emailAdministrador); ?>" required>

                <label for="senha">Senha:</label>
                <input type="text" name="senha" value="<?= htmlspecialchars($senhaAdministrador); ?>" required>

                <input type="submit" value="Salvar Alterações">
            </form>
        </div>
    </div>

</body>
</html>
