<?php
$host = 'localhost';
$usuario ='root';
$senha = 'medeirosfoda';
$banco = 'floricultura';
// Conectar ao banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $banco);
// Verificar se a conexão foi bem-sucedida
if (!$conexao) {
die('<span style="color:red;">Erro na conexão: <br></span>' . mysqli_connect_error());
}
echo"<br>";
echo '<strong><span style="color: darkgreen;">Conexão bem-sucedida!<br></span></strong>';

?>