<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business System - Clientes </title>
    <link rel="shortcut icon" type="imagex/png" href="./assets/img/ico.svg">
    <link rel="stylesheet" href="style.css">
</head>
<body>



    <div class="menu">
        <ul>
            <li><a href="index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="cliente.php" class="meumenu meumenu-active" title="Clientes">Clientes</a></li>
            <li><a href="#" class="meumenu" title="Produtos">Produtos</a></li>
            <li><a href="#" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>




    <div class="container">
        <hr>
        <?php  
        if($_SERVER['REQUEST_METHOD'] != 'GET' OR !isset($_GET['id'])){
            header("Location: produtos.php");
        }
        
        
        include 'conexao.php';

        $id = $_GET['id'];
        $stmt = $db->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);


            $idCliente = $dados['id'];
            $nome = $dados['nome'];
            $valor = $dados['valor'];
            $estoque = $dados['estoque'];
            $codigo = $dados['codigo'];



        
    ?>
        <div class="formulario">
            <form action="insertion.php?id=<?=$idCliente;?>" method="POST" name="formulario" onsubmit="return validarDadosCliente()">


                <label for="nome">Nome do produto: </label>
                <input type="text" name="nome" id="nome" value="<?= $nome;?>">
            


                <label for="valor">Valor do produto: </label>
                <input type="text" name="valor" id="valor" value="<?= $valor;?>">
    


                <label for="estoque">Estoque do produto: </label>
                <input type="text" name="estoque" id="estoque" value="<?= $estoque;?>">



                <label for="codigo">Código: </label>
                <input type="text" name="codigo" id="codigo" value="<?= $codigo;?>">
              
                <input type="submit">


            </form>
        </div>

    

    </div>


</body>
<script src="script.js"></script>
<script src="https://kit.fontawesome.com/128c4fe943.js" crossorigin="anonymous"></script>
</html>