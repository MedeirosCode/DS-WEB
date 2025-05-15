<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $stmt = $db->prepare("SELECT * FROM administrador WHERE email = ? AND senha = ?");
    $stmt->execute([$login, $senha]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['email'] = $user['email'];
        header("Location: ../../../Produtos/index.php");
        exit();
    } else {
        $_SESSION['erro'] = "Login ou senha incorretos!";
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assetsLogin/imgLogin/dogzinho.png" type="image/png">
    <title>Login</title>

    

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: 500;
        }

        input {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #4e54c8;
            outline: none;
        }

        button {
            background: #4e54c8;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #3b40a4;
        }

        .error-msg {
            color: #d32f2f;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_SESSION['erro'])) {
            echo '<p class="error-msg">'.$_SESSION['erro'].'</p>';
            unset($_SESSION['erro']);
        }
        ?>
        <form action="login.php" method="POST">
            <label for="login">Login (E-mail):</label>
            <input type="text" name="login" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
