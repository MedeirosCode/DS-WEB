<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='icon' href='./assets/img/dogzinho.png' type='image/png'>
        <script>
            alert('Está faltando o método POST');
            window.location.href = 'produtos.php';
        </script>
    </head>
    <body></body>
    </html>";
    exit;
}

include "conexao.php";

$nome = trim($_POST['nome']);
$codigo = trim($_POST['codigo']);
$estoque = trim($_POST['estoque']);
$preco = trim($_POST['preco']);

if (!$nome || !$codigo || !$estoque || !$preco) {
    echo "<!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='icon' href='./assets/img/dogzinho.png' type='image/png'>
        <script>
            alert('Todos os campos são obrigatórios.');
            window.location.href = 'produtos.php';
        </script>
    </head>
    <body></body>
    </html>";
    exit;
}

if (strlen($nome) < 3) {
    echo "<!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='icon' href='./assets/img/dogzinho.png' type='image/png'>
        <script>
            alert('O nome deve possuir mais que 2 caracteres!');
            window.location.href = 'produtos.php';
        </script>
    </head>
    <body></body>
    </html>";
    exit;
}

if (!is_numeric($estoque) || intval($estoque) < 0) {
    echo "<!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='icon' href='./assets/img/dogzinho.png' type='image/png'>
        <script>
            alert('O estoque deve ser um número inteiro positivo ou zero!');
            window.location.href = 'produtos.php';
        </script>
    </head>
    <body></body>
    </html>";
    exit;
}

$precoConvertido = str_replace(",", ".", $preco);
if (!is_numeric($precoConvertido) || floatval($precoConvertido) < 0) {
    echo "<!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='icon' href='./assets/img/dogzinho.png' type='image/png'>
        <script>
            alert('O preço deve ser um número positivo!');
            window.location.href = 'produtos.php';
        </script>
    </head>
    <body></body>
    </html>";
    exit;
}

$verificaCodigo = $db->prepare("SELECT COUNT(*) FROM produtos WHERE codigo = :codigo");
$verificaCodigo->bindParam(':codigo', $codigo);
$verificaCodigo->execute();

if ($verificaCodigo->fetchColumn() > 0) {
    echo "<!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='icon' href='./assets/img/dogzinho.png' type='image/png'>
        <script>
            alert('Este código já está cadastrado para outro produto!');
            window.location.href = 'produtos.php';
        </script>
    </head>
    <body></body>
    </html>";
    exit;
}

try {
    $statement = $db->prepare("
        INSERT INTO produtos (nome, codigo, estoque, preco) 
        VALUES (:nome, :codigo, :estoque, :preco)
    ");

    $statement->bindParam(':nome', $nome);
    $statement->bindParam(':codigo', $codigo);
    $statement->bindParam(':estoque', $estoque);
    $statement->bindParam(':preco', $precoConvertido);

    $statement->execute();

    header("Location: produtos.php");
    exit;

} catch (PDOException $e) {
    echo "<!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro ao inserir</title>
        <link rel='icon' href='./assets/img/dogzinho.png' type='image/png'>
    </head>
    <body>
        <h3>Erro ao inserir o produto: " . htmlspecialchars($e->getMessage()) . "</h3>
    </body>
    </html>";
}
?>
