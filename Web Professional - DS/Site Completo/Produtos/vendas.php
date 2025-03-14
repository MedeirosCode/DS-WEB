<?php
session_start();
include 'conexao.php';

// Consulta para contar o número de vendas
$stmt = $db->query("SELECT COUNT(id) AS total_vendas FROM produtos");
$total_vendas = $stmt->fetch(PDO::FETCH_ASSOC)['total_vendas'];

$clientes = $db->query("SELECT COUNT(id) AS total_clientes FROM clientes");
$total_clientes = $clientes->fetch(PDO::FETCH_ASSOC)['total_clientes'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="shortcut icon" href="./assets/img/dogg.ico" type="image/x-icon">
<link rel="icon" href="./assets/img/dogg.ico" type="image/x-icon">


</head>
<body>
    <div class="menu">
        <div class="logo">
            <img src="./assets/img/logo-arrumada.png" alt="Logotipo Mavi Pets">
        </div>
        <ul class="lucas">
            <li><a href="index.php" class="meumenu">Home</a></li>
            <li><a href="./Clientes/clientes.php" class="meumenu">Clientes</a></li>
            <li><a href="produtos.php" class="meumenu">Produtos</a></li>
            <li><a href="./vendas.php" class="meumenu meumenu-active">Vendas</a></li>
        </ul>
    </div>
    
    <div class="medeiros">
        <div class="formulariovenda">
        <h1 class="venda">Total de Vendas: <?php echo $total_vendas; ?></h1>
        <br>
        <h1 class="venda">Total de Clientes: <?php echo $total_clientes; ?></h1>
    </div>
</body>
</html>
