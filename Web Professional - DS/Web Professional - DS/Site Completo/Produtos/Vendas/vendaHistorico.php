<?php
include 'conexaoVendas.php';

try {
    $sql = "
        SELECT 
            pv.idVenda, 
            pv.idProduto, 
            pv.quantidade,
            v.idCliente, 
            c.nome AS nomeCliente,
            p.nome AS nomeProduto,
            p.preco
        FROM produtosvendidos pv
        JOIN vendas v ON pv.idVenda = v.id
        JOIN clientes c ON v.idCliente = c.id
        JOIN produtos p ON pv.idProduto = p.id
    ";

    $dados = $db->query($sql);
    $vendasProdutos = $dados->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}

$caminho = realpath('../assets/img/dogzinho.png');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vendas e Produtos</title>
    <link rel="stylesheet" href="./assetsVendas/cssVendas/cssVendas.css">
    <link rel="icon" href="./assetsVendas/imgVendas/dogzinho.png" type="image/png">
<body>


    <!-- Menu -->
    <ul class="lucas">
        <li><a href="../index.php" class="meumenu" title="Home">Home</a></li>
        <li><a href="../Clientes/clientes.php" class="meumenu" title="Clientes">Clientes</a></li>
        <li><a href="../produtos.php" class="meumenu" title="Produtos">Produtos</a></li>
        <li><a href="./vendas.php" class="meumenu meumenu-active" title="Vendas">Vendas</a></li>
    </ul>

    <!-- Conteúdo -->
    <div class="container">
        <h2>Lista de Vendas e Produtos</h2>

        <table>
            <thead>
                <tr>
                    <th>Nome do Cliente</th>
                    <th>ID Venda</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                    <th>ID Cliente</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendasProdutos as $linha): ?>
                    <tr>
                        <td><?= htmlspecialchars($linha['nomeCliente']) ?></td>
                        <td><?= htmlspecialchars($linha['idVenda']) ?></td>
                        <td><?= htmlspecialchars($linha['nomeProduto']) ?></td>
                        <td><?= htmlspecialchars($linha['quantidade']) ?></td>
                        <td>R$ <?= number_format($linha['preco'], 2, '.', '.') ?></td>
                        <td>
                            R$ <?= number_format($linha['preco'] * $linha['quantidade'], 2, ',', '.') ?>
                        </td>
                        <td><?= htmlspecialchars($linha['idCliente']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
</html>
