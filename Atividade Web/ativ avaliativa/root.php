<?php
// Incluindo a conexão com o banco de dados (se necessário)
include_once('conexao.php');

// Obtendo os valores enviados pelo formulário
$nome = $_POST['nome'];
$senha = $_POST['senha'];

// Verificando as credenciais
if ($nome === 'medeiros' && $senha === '123') {
    // Redireciona para a página index.php se as credenciais estiverem corretas
    header('Location: login.php');
     
} else {
    // Exibe uma mensagem de erro se as credenciais estiverem incorretas
    echo "Usuário ou senha inválidos.";
    echo '<form action="logout.php" method="POST">
        <button type="submit" name="action" value="destroy">Excluir Sessão</button>
      </form>';
}
?>
