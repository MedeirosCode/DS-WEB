<?php
$host = 'localhost';
$usuario ='root';
$senha = 'medeirosfoda';
$banco = 'loja';
// Conectar ao banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $banco);
// Verificar se a conexão foi bem-sucedida
if (!$conexao) {
die('Erro na conexão: ' . mysqli_connect_error());
}
echo"<br>";
echo '<span style="color: red;">Conexão bem-sucedida!<br></span>';

?>