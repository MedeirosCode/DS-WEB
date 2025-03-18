<?php  
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; // Sem criptografia, conforme solicitado.

    if (!empty($nome) && !empty($cargo) && !empty($email) && !empty($senha)) {
        try {
            $statement = $db->prepare("INSERT INTO clientes (nome, cargo, email, senha) VALUES (:nome, :cargo, :email, :senha)");
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':cargo', $cargo);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':senha', $senha);
            $statement->execute();

            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao cadastrar: ".$e->getMessage()."');</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="./assetsLogin/cssLogin/styleDashbord.css">
</head>
<body>
    <div class="containerei">
        <div class="formulario">
            <h1> Cadastrar administradores: </h1>
            <form action="insertion.php" method="POST"> <!-- Corrigido para enviar os dados para a própria página -->
                <label for="nome"> Nome: </label>
                <input type="text" name="nome" required>

                <label for="cargo"> Cargo: </label>
                <input type="text" name="cargo" required>

                <label for="email"> E-mail: </label>
                <input type="email" name="email" required>

                <label for="senha"> Senha: </label>
                <input type="password" name="senha" required>

                <input type="submit" value="Cadastrar">
            </form>
        </div>

        <table id="administradores">
            <tr> 
                <th> Nome: </th>
                <th> Cargo: </th>
                <th> E-mail: </th>
                <th> Editar: </th>
                <th> Excluir: </th>
            </tr>

            <?php  
                try {
                    $dados = $db->query("SELECT * FROM administrador");
                    $todos = $dados->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($todos as $linha) {
                        echo "<tr>
                            <td>{$linha['nome']}</td>
                            <td>{$linha['cargo']}</td>
                            <td>{$linha['email']}</td>
                            <td><a href='updateAdmin.php?id={$linha['id']}'>Editar</a></td>
                            <td><a href='deleteAdmin.php?id={$linha['id']}'>Excluir</a></td>
                        </tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='5'>Erro ao carregar administradores: " . $e->getMessage() . "</td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>
