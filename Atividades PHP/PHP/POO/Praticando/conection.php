<?php

$db = new PDO("mysql:host=localhost;dbname=pdo", "root", "");



/*Consulta e exibe o primeiro cliente
$dados = $db->query("SELECT * FROM clientes");
$todos = $dados->fetch(PDO::FETCH_ASSOC);

print_r($todos);
echo "<br>";

print_r($todos['email']);
echo "<br>";

// Consulta e percorre todos os clientes

$dados = $db->query("SELECT * FROM clientes");
$todos = $dados->fetchAll(PDO::FETCH_ASSOC); // Pega todos os resultados

foreach ($todos as $linha) { // Agora sim percorre todos os clientes
    echo "ID: " . $linha['id'] . "<br>";
    echo "Nome: " . $linha['nome'] . "<br>";
    echo "Email: " . $linha['email'] . "<br><br>";
    
}

echo "<h2>Inserindo dados</h2>";

$statement = $db -> prepare("INSERT INTO clientes (nome , email) VALUES (?,?)");
$nome = "pires";
$email = "medeiros.medeiros@gmail.com";

$statement -> execute(array($nome , $email));
$statement -> execute(array("steve" , "steve.medeiros@gmail.com"));
$statement -> execute(array("mercedes" , "mercedes.medeiros@gmail.com"));

*/

?>
