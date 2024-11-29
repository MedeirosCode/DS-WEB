<?php
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
    echo "<p style='color: green;'>Bem-vindo, <b>" . ($_SESSION['login']) . "</b>! Você já está logado.</p>";
    echo '<a href="destruir.php" style="color: red; text-decoration: none;">Sair da Sessão</a>';
} else {
    echo "<p style='color: red;'>Você não está logado. Por favor, faça login.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        form {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"], button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover, input[type="submit"]:hover {
            background: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="dashboard.php" method="POST">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" placeholder="Digite seu login" required>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            
        </form>
        <form action="destruir.php" method="POST">
            <button type="submit" name="action" value="destroy">Excluir Sessão</button>
        </form>
        <form action="salvar.php" method="POST">
            <button type="submit" name="action" value="save">Salvar Sessão</button>
        </form>
    </div>
</body>
</html>
