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
            width: 500px;
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
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align:center;
            color: blue;
        }

        .tabela-clientes {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tabela-clientes th, .tabela-clientes td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .tabela-clientes th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Cadastro de Produtos -->
        <div class="produtos">
            <h2>Adicionando nome e email para o BD com PDO</h2>
            <form action="dados.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
                
                <input type="submit" value="Enviar">
            </form>
        </div>

        <!-- Exibição dos Clientes -->
        <div class="clientes">
            <h2>Já cadastrados</h2>

            <?php
            // Conectando ao banco de dados
            include_once('conection.php');

            // Consultando os clientes
            $dados = $db->query("SELECT * FROM clientes");
            $todos = $dados->fetchAll(PDO::FETCH_ASSOC); // Pega todos os resultados

            if (count($todos) > 0) {
                // Exibindo a tabela de clientes
                echo '<table class="tabela-clientes">';
                echo '<tr><th>ID</th><th>Nome</th><th>Email</th></tr>';
                foreach ($todos as $linha) {
                    echo '<tr>';
                    echo '<td>' . $linha['id'] . '</td>';
                    echo '<td>' . $linha['nome'] . '</td>';
                    echo '<td>' . $linha['email'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>Nenhum cliente encontrado.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>
