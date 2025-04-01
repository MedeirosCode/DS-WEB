<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business System</title>
    <link rel="stylesheet" href="./assetsVendas/cssVendas/cssVendas.css">

</head>
<body>
<ul class="lucas">
            <li><a href="index.php" class="meumenu">Home</a></li>
            <li><a href="./Clientes/clientes.php" class="meumenu">Clientes</a></li>
            <li><a href="produtos.php" class="meumenu">Produtos</a></li>
            <li><a href="./vendas.php" class="meumenu meumenu-active">Vendas</a></li>
            <form action="vendaPost.php">
                <button type="submit" style="display: flex; align-items: center; gap: 5px; padding: 10px;">
                    <i class="fas fa-shopping-cart"></i>
                    Ir para Outra Página
                </button>
            </form>
        </ul>
    <div class="container">
        <hr>
        <div class="carrinho">
            <div><h2>Carrinho de compras</h2></div>
            <p id="aviso"></p>
            <p id="dadosCliente">Cliente: </p>
            <table id="tabelaCarrinho"></table>
            <div id="rodapeCarrinho"></div>
        </div>
    <?php  
        include 'conexaoVendas.php';

        echo "<h4>Selecione um cliente</h4>";
        $dados = $db->query("SELECT * FROM clientes");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC); //Todos os registros retornados
        echo "<table id='clientes'>";
        echo "
            <tr>
                <th>Selecione</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Observacao</th>
                <th>Editar</th>
            </tr>
        ";
        foreach($todos as $linha){
            extract($linha);
            echo "<tr>";
            echo "<td><i onclick=\"selecionaCliente($id,'$nome')\" class='fa-solid fa-user-plus'></i></td>";
            echo "<td>".$nome."</td>";
            echo "<td>".$email."</td>";
            echo "<td>".$observacao."</td>";
            echo "<td><a href='clientesAlteracao.php?id=$id'><i class='fa-solid fa-pencil'></i></a></td>";
            echo "</tr>";
        }
        echo "</table>";


        /* ==================== FIM DO CLIENTE E INICIO DO PRODUTO ==================== */

        echo "<h4>Selecione os Produtos</h4>";
        $dados = $db->query("SELECT * FROM produtos");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC); //Todos os registros retornados
        echo "<table id='produtos'>";
        echo "
            <tr>
                <th>Selecione</th>
                <th>Código</th>
                <th>Nome</th>
                <th>Estoque</th>
                <th>Preço</th>
                <th>Editar</th>
            </tr>
        ";
        foreach($todos as $linha){
            extract($linha);
            echo "<tr>";
            echo "<td><i onclick=\"selecionaProduto($id,'$nome', $codigo, $estoque, $preco)\" class='fa-solid fa-cart-plus'></i></td>";
            echo "<td>".$codigo."</td>";
            echo "<td>".$nome."</td>";
            echo "<td>".$estoque."</td>";
            echo "<td>".$preco."</td>";
            echo "<td><a href='produtoAlteracao.php?id=$id'><i class='fa-solid fa-pencil'></i></a></td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>
    </div>
</body>
<script src="./assetsVendas/jsVendas/jsVenda.js"></script>
<script src="https://kit.fontawesome.com/8403ba6cce.js" crossorigin="anonymous"></script>
</html>