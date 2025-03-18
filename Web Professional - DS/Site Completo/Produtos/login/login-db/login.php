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
    <link rel="stylesheet" href="./assetsLogin/cssLogin/styleLogin.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_SESSION['erro'])) {
            echo '<p style="color:red">'.$_SESSION['erro'].'</p>';
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