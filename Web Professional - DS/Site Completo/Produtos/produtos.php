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
        <div class="logo">
            <img src="./assets/img/logo-arrumada.png" alt="Logotipo Mavi Pets">
        </div>
        <ul class="ei">
            <li><a href="index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="./Clientes/clientes.php" class="meumenu" title="Clientes">Clientes</a></li>
            <li><a href="../produtos.php" class="meumenu meumenu-active" title="Produtos">Produtos</a></li>
            <li><a href="../Vendas/vendaPost.php" class="meumenu" title="Vendas">Vendas</a></li>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

            <form action="./Vendas/exibirVendas.php">
                <button type="submit" style="display: flex; align-items: center; gap: 5px; padding: 10px;">
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </form>

</form>

        </ul>
    </div>
    <div class="containerei">
      
        <div class="formulario">
            <h1>Cadastro de produtos:</h1>
            <form action="insertion.php" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
                
                <label for="nome"> Nome: </label>
                <input type="text" name="nome" id="nome">
                <p class="erro-input" id="erro-nome"></p>

                <label for="codigo"> Código: </label>
                <input type="text" name="codigo" id="codigo">
                <p class="erro-input" id="erro-codigo"></p>
                
                <label for="estoque"> Estoque: </label>
                <input type="text" name="estoque" id="estoque">
                <p class="erro-input" id="erro-estoque"></p>

                <label for="preco"> Preco: </label>
                <input type="text" name="preco" id="preco" >
                <p class="erro-input" id="erro-valor"></p>

                <input type="submit">
                
            </form>
        </div>

    <table id="produtos">
        <tr> 
            <th> Nome </th>
            <th> Codigo </th>
            <th> Estoque </th>
            <th> Preco </th>
            <th> Editar </th>
            <th> Excluir </th>



            <style>
/* Corrige alinhamento do botão "OK" do SweetAlert */
.swal2-popup .swal2-confirm {
    position: static !important;
    margin: auto !important;
    display: inline-block !important;
}
</style>






    
    <?php  
        include 'conexao.php';

        
        $dados = $db->query("SELECT * FROM produtos");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC); //Todos os registros retornados
        foreach($todos as $linha){
            $idCliente = $linha['id'];
            $nomeProduto = $linha['nome'];
            $codigoProduto = $linha['codigo'];
            $estoqueProduto = $linha['estoque'];
            $precoProduto = $linha['preco'];


            echo "
                <tr>
                    <td> $nomeProduto </td>
                    <td> $codigoProduto </td>
                    <td> $estoqueProduto </td>
                    <td> $precoProduto </td>

                    <td><a class='link-alteracao' href='update.php?id=$idCliente'><i class='fa-solid fa-pencil'></i></a></td>
                    <td><a class='link-alteracao' href='delete.php?id=$idCliente'><i class='fa-solid fa-trash'></i></a></td>

                    </tr>

                ";


        }
    ?>
    </div>
    </table>
        <br><br>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="./assets/js/script.js"></script>
<script src="https://kit.fontawesome.com/128c4fe943.js" crossorigin="anonymous"></script>
</html>

