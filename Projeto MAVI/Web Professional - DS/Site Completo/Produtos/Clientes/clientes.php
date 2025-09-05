<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <!-- Ícone da aba -->
    <link rel="icon" type="image/png" href="../assets/img/dogzinho.png">

    <!-- Estilos -->
    <link rel="stylesheet" href="./assetsClientes/csscliente/styleCliente.css">
</head>
<body>
    <div class="menu">
        <ul class="ei">
            <li><a href="../index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="./clientes.php" class="meumenu meumenu-active" title="Clientes">Clientes</a></li>
            <li><a href="../produtos.php" class="meumenu" title="Produtos">Produtos</a></li>
            <li><a href="../Vendas/vendas.php" class="meumenu" title="Vendas">Vendas</a></li>
            <form action="../Vendas/vendaHistorico.php">
                <button type="submit" style="display: flex; align-items: center; gap: 5px; padding: 10px;">
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </form>
        </ul>
    </div>

    <div class="container">
        <div class="formulario">
            <h1>Cadastro de clientes:</h1>
            <form action="insertionCliente.php" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
                <p class="erro-input" id="erro-nome"></p>

                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email">
                <p class="erro-input" id="erro-valor"></p>

                <label for="observacao">Observação:</label>
                <textarea name="observacao" id="observacao" rows="4" cols="100"></textarea>
                <p class="erro-input" id="erro-estoque"></p>

                <input type="submit">
            </form>
        </div>

        <table id="clientes">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Observação</th>
                <th>Editar</th>
                <th>Excluir</th>
        <?php  
            include 'conexaoCliente.php';
            $dados = $db->query("SELECT * FROM clientes");
            $todos = $dados->fetchAll(PDO::FETCH_ASSOC);
            foreach($todos as $linha){
                $idCliente = $linha['id'];
                $nomeCliente = $linha['nome'];
                $emailCliente = $linha['email'];
                $observacaoCliente = $linha['observacao'];

                echo "
                    <tr>
                        <td>$nomeCliente</td>
                        <td>$emailCliente</td>
                        <td>$observacaoCliente</td>
                        <td><a class='link-alteracao' href='updateCliente.php?id=$idCliente'><i class='fa-solid fa-pencil'></i></a></td>
                        <td><a class='link-alteracao' href='deleteCliente.php?id=$idCliente'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
                ";
            }
        ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assetsClientes/jscliente/scriptCliente.js"></script>
    <script src="https://kit.fontawesome.com/128c4fe943.js" crossorigin="anonymous"></script>
</body>
</html>
