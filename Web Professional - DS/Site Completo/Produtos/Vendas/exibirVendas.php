<?php
include 'conexaoVendas.php';

try {
    // Consulta SQL corrigida para unir os dados corretamente
    $sql = "
    SELECT produtosvendidos.idVenda, produtosvendidos.idProduto 
    FROM produtosvendidos  
    JOIN vendas ON produtosvendidos.idVenda = vendas.idVenda;
    
    ";

    $dados = $db->query($sql);
    $todos = $dados->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vendas e Produtos</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Lista de Vendas e Produtos</h2>
    <table>
        <thead>
            <tr>
                <th>ID Venda</th>
                <th>ID Produto</th>
                <th>ID Cliente</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todos as $linha): ?>
                <tr>
                    <td><?= htmlspecialchars($linha['idVenda']) ?></td>
                    <td><?= htmlspecialchars($linha['idProduto']) ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
