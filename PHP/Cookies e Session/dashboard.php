<?php
// Inicia a sessão
session_start();

// Verifica se a ação enviada pelo formulário é "save"
if (isset($_POST['action']) && $_POST['action'] == 'save') {
    
    // Define as variáveis de sessão
    $_SESSION['login'] = 'medeiros';  
    $_SESSION['senha'] = '123'; 

    // Exibe mensagem de sucesso
    echo "Sessão salva com sucesso!";
    echo '<br>Login: ' . ($_SESSION['login']);
    echo '<br>Senha: ' . ($_SESSION['senha']);
}
?>
