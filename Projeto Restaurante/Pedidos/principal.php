<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <link rel="stylesheet" href="./assets/css/style.css">
</body>
</html>


<?php
include 'config.php';
$clientes = $pdo->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <title>Restaurante</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Clientes</h1>
    <div class="adicionar">
        
        <a href="add_cliente.php">Adicionar Cliente</a>
        
        <a href="add_produto.php">Adicionar Produto</a>
     
    </div>
    <ul>
        <?php foreach ($clientes as $cliente) { ?>
            <li><a href="pedidos.php?id=<?= $cliente['id'] ?>"> <?= $cliente['nome'] ?> </a></li>
        <?php } ?>
    </ul>
</body>
</html> 