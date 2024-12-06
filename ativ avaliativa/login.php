<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulários Lado a Lado</title>
    <style>
        body {
            background-color: #f9f9f9;
            color: #333;
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 30px;
            padding: 20px;
        }

        .produtos {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .clientes{
            text-align: center;
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            color: #555;
            color:black;
        }

        input[type="text"],
        input[type="number"] {
            width: 280px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid black;
            border-radius: 5px;
            font-size: 14px;
            color:black;
        }

        input[type="submit"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            gap:20px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        h2{
            text-align:center;
            color: blue;
        }
        button{
            gap:20px;
            width: 300px;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Cadastro de Produtos -->
        <div class="produtos">
            <h2>Cadastro de Produtos</h2>
            <form action="produtos.php" method="POST">
            <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="valor">Valor:</label>
    <input type="number" id="valor" name="valor" required>

    <label for="estoque">Descrição:</label>
    <input type="text" id="descricao" name="descricao" required>

    <input type="submit" value="Enviar" >

    <br><br>
    <!-- Botão para voltar ao login.php -->
    <a href="index.php">
        <button type="button">Voltar para o Login</button>
    </a>
        <br><br>
    <a href="cookie.php">
        <button type="button">Adicionar cookie</button>
    </a>


                
            </form>
            <?php
            include_once('conexao.php');
            echo "<br>";
            $sql = "SELECT * FROM utilitarios ORDER BY nome ASC";
            $resultado = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultado) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "ID: " . $linha['id'] . " - Nome: " . $linha['nome'] . "<br>";
                }
            } else {
                echo "Nenhum registro encontrado.";
            }
            ?>
        </div>

        <!-- Cadastro de Clientes -->
        <div class="clientes">
            <h2>Cadastro de Clientes</h2>
            <form action="usuarios.php" method="POST">
                <label for="nome-cliente">Nome:</label>
                <input type="text" id="nome-cliente" name="nome" required>
                
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>

                <label for="senha">Senha:</label>
                <input type="number" id="senha" name="senha" required>
                
                <input type="submit" value="Enviar">
                <br><br>
                <a href="index.php">
        <button type="button">Voltar para o Login</button>
    </a>
    <br><br>
    <a href="cookie.php">
        <button type="button">Adicionar cookie</button>
    </a>
            </form>
            <?php
            include_once('conexao.php');
            echo "<br>";
            $sql = "SELECT * FROM usuarios ORDER BY nome ASC";
            $resultado = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultado) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "ID: " . $linha['id'] . " - Nome: " . $linha['nome'] . "<br>";
                }
            } else {
                echo "Nenhum registro encontrado.";
            }
            ?>
        </div>
    </div>
</body>
</html>
