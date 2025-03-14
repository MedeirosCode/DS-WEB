<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="shortcut icon" href="./assetsClientes/imgcliente/dogg.ico" type="image/x-icon">
<link rel="icon" href="./assetsClientes/img/dogg.ico" type="image/x-icon">

<!-- Estilos -->
<link rel="stylesheet" href="./assetsClientes/csscliente/styleCliente.css">
</head>
<body>
    <div class="menu">
        <div class="logo">
            <img src="./assetsClientes/imgcliente/logo-arrumada.png" alt="Logotipo Mavi Pets">

        </div>
        <ul class="ei">
            <li><a href="../index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="./clientes.php" class="meumenu meumenu-active" title="Clientes">Clientes</a></li>
            <li><a href="../produtos.php" class="meumenu" title="Produtos">Produtos</a></li>
            <li><a href="../vendas.php" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>
    <br><br><br>
    <div class="container">
    
        
        <div class="formulario">
        <h1>Cadastro de clientes: </h1>
        <br><br>
            <form action="insertionCliente.php" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
                
                <label for="nome"> Nome: </label>
                <input type="text" name="nome" id="nome">
                <p class="erro-input" id="erro-nome"></p>


                <label for="email"> E-mail: </label>
                <input type="text" name="email" id="email" >
                <p class="erro-input" id="erro-valor"></p>
                
                <label for="observacao"> Observação:</label>
                <textarea name="observacao" id="observacao" rows="4" cols="100"></textarea>
                <p class="erro-input" id="erro-estoque"></p>

                

                <input type="submit">
                
            </form>
        </div>

    <table id="clientes">
        <tr> 
            <th> Nome </th>
            <th> E-mail </th>
            <th> Observação </th>
            <th> Editar </th>
            <th> Excluir </th>
    
    <?php  
        include 'conexaoCliente.php';

        
        $dados = $db->query("SELECT * FROM clientes");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC); //Todos os registros retornados
        foreach($todos as $linha){
            $idCliente = $linha['id'];
            $nomeCliente = $linha['nome'];
            $emailCliente = $linha['email'];
            $observacaoCliente = $linha['observacao'];
            


            echo "
                <tr>
                    <td> $nomeCliente </td>
                    <td> $emailCliente </td>
                    <td> $observacaoCliente </td>
                    

                    <td><a class='link-alteracao' <a href='updateCliente.php?id=$idCliente'><i class='fa-solid fa-pencil'></i></i></a> </td>
                    <td><a class='link-alteracao' <a href='deleteCliente.php?id=$idCliente'><i class='fa-solid fa-trash'></i></a> </td>
                    </tr>

                ";


        }
    ?>
    </div>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
<script src="./assetsClientes/jscliente/scriptCliente.js"></script>
<script src="https://kit.fontawesome.com/128c4fe943.js" crossorigin="anonymous"></script>
</html>