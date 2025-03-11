<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos </title>
    <link rel="shortcut icon" href="./assets/img/dogg.ico" type="image/x-icon">
<link rel="icon" href="./assets/img/dogg.ico" type="image/x-icon">

<!-- Estilos -->
<link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="menu">
        <ul class="ei">
            <li><a href="index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="./Clientes/clientes.php" class="meumenu" title="Clientes">Clientes</a></li>
            <li><a href="produtos.php" class="meumenu meumenu-active" title="Produtos">Produtos</a></li>
            <li><a href="vendas.php" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>
    <div class="container">
        <hr>
        <div class="formulario">
            <form action="insertion.php" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
                
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome">
                <p class="erro-input" id="erro-nome"></p>


                <label for="valor">Valor: </label>
                <input type="text" name="valor" id="valor" >
                <p class="erro-input" id="erro-valor"></p>
                
                <label for="estoque">Estoque: </label>
                <input type="text" name="estoque" id="estoque">
                <p class="erro-input" id="erro-estoque"></p>

                <label for="codigo">Codigo: </label>
                <input type="text" name="codigo" id="codigo">
                <p class="erro-input" id="erro-codigo"></p>

                <input type="submit">
                
            </form>
        </div>

    <table id="produtos">
        <tr> 
            <th> Nome </th>
            <th> valor </th>
            <th> estoque </th>
            <th> codigo </th>
            <th> Editar </th>
            <th> Excluir </th>
    
    <?php  
        include 'conexao.php';

        echo "<h2>Consulta com muitas linhas</h2>";
        $dados = $db->query("SELECT * FROM produtos");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC); //Todos os registros retornados
        foreach($todos as $linha){
            $idCliente = $linha['id'];
            $nomeProduto = $linha['nome'];
            $valorProduto = $linha['valor'];
            $estoqueProduto = $linha['estoque'];
            $codigoProduto = $linha['codigo'];


            echo "
                <tr>
                    <td> $nomeProduto </td>
                    <td> $valorProduto </td>
                    <td> $estoqueProduto </td>
                    <td> $codigoProduto </td>

                    <td><a class='link-alteracao' <a href='update.php?id=$idCliente'><i class='fa-solid fa-pencil'></i></i></a> </td>
                    <td><a class='link-alteracao' <a href='delete.php?id=$idCliente'><i class='fa-solid fa-trash'></i></a> </td>
                    </tr>

                ";


        }
    ?>
    </div>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
<script src="./assets/js/script.js"></script>
<script src="https://kit.fontawesome.com/128c4fe943.js" crossorigin="anonymous"></script>
</html>