<?php  
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 

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
    <link rel="icon" href="./assetsLogin/imgLogin/dogzinho.png" type="image/png">

    <title>Cadastro de Administradores</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .containerei {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 1000px;
        }

        .formulario {
            margin-bottom: 40px;
        }

        h1 {
            margin-bottom: 20px;
            color: #4e54c8;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        label {
            grid-column: span 2;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 100%;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #4e54c8;
            outline: none;
        }

        input[type="submit"] {
            grid-column: span 2;
            padding: 12px;
            background-color: #4e54c8;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #3a3fc0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #4e54c8;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
        }

        a {
            color: #4e54c8;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 700px) {
            form {
                grid-template-columns: 1fr;
            }

            input[type="submit"] {
                grid-column: span 1;
            }
        }
        .formulario {
    margin-bottom: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    width: 100%;
    max-width: 400px;
}

label, input {
    width: 100%;
    text-align: center;
}

input[type="submit"] {
    width: 100%;
}

    </style>
</head>
<body>
    <div class="containerei">
        <div class="formulario">
            <h1>Cadastrar administradores:</h1>
            <form action="insertion.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>

                <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" required>

                <label for="email">E-mail:</label>
                <input type="email" name="email" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>

                <input type="submit" value="Cadastrar">
            </form>
        </div>

        <table id="administradores">
            <tr> 
                <th>Nome</th>
                <th>Cargo</th>
                <th>E-mail</th>
                <th>Editar</th>
                <th>Excluir</th>
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
