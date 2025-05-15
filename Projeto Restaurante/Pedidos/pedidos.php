<?php
include 'config.php';
$cliente_id = $_GET['id'];
$cliente = $pdo->query("SELECT * FROM clientes WHERE id = $cliente_id")->fetch(PDO::FETCH_ASSOC);
$produtos = $pdo->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);
$pedidos = $pdo->query("SELECT p.id, pr.nome, p.quantidade FROM pedidos p JOIN produtos pr ON p.produto_id = pr.id WHERE cliente_id = $cliente_id")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['produto_id'])) {
    $produto_id = $_POST['produto_id'];
    $stmt = $pdo->prepare("INSERT INTO pedidos (cliente_id, produto_id, quantidade) VALUES (?, ?, 1)");
    $stmt->execute([$cliente_id, $produto_id]);
    header("Location: pedidos.php?id=$cliente_id");
}

if (isset($_GET['delete'])) {
    $pedido_id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM pedidos WHERE id = ?");
    $stmt->execute([$pedido_id]);
    header("Location: pedidos.php?id=$cliente_id");
}
?>
<link rel="stylesheet" href="style.css">
<h1>Pedidos de <?= $cliente['nome'] ?></h1>

<form method="post">
    <select name="produto_id">
        <?php foreach ($produtos as $produto) { ?>
            <option value="<?= $produto['id'] ?>"> <?= $produto['nome'] ?> - R$ <?= $produto['preco'] ?> </option>
        <?php } ?>
    </select>
    <button type="submit" class="btn">Adicionar ao Pedido</button>
</form>
<h2>Itens Pedidos</h2>
<ul>
    <?php foreach ($pedidos as $pedido) { ?>
        <li>
            <?= $pedido['nome'] ?> (<?= $pedido['quantidade'] ?>)
            <a href="pedidos.php?id=<?= $cliente_id ?>&delete=<?= $pedido['id'] ?>" class="btn-delete">Remover</a>
        </li>
    <?php } ?>
</ul>