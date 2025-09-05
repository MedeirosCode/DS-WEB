<?php
session_start();

// Salva os dados de login e senha na sessão
if (isset($_POST['action']) && $_POST['action'] == 'save') {
    $_SESSION['login'] = 'medeiros';
    $_SESSION['senha'] = '123';

    echo "<p style='color: green;'>Sessão salva com sucesso!</p>";
    echo "<p>Login: <b>" . htmlspecialchars($_SESSION['login']) . "</b></p>";
    echo "<p>Senha: <b>" . htmlspecialchars($_SESSION['senha']) . "</b></p>";
    echo '<a href="index.php" style="text-decoration: none; color: blue;">Voltar para a página inicial</a>';
}
?>
