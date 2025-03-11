<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site avaliativo</title>
    <link rel="shortcut icon" type="imagex/png" href="./assets/img/ico.svg">
    <link rel="icon" type="image/png" href="iconmavi.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu">
        <div class="logo">
            <img src="logo-mavi.jpg" alt="Logotipo Mavi Pet's">
        </div>
        <ul>
            <li><a href="#" class="meumenu meumenu-active" title="Home">Home</a></li>
            <li><a href="#" class="meumenu" title="Clientes">Clientes</a></li>
            <li><a href="produtos.php" class="meumenu" title="Produtos">Produtos</a></li>
            <li><a href="#" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>
    <div class="container">
        <hr>
        <h1>Dashboard</h1>
        <p>Olá! Somos a Mavi Pet’s, uma loja dedicada a oferecer os melhores produtos e serviços para o seu pet. Estamos em pleno desenvolvimento para proporcionar uma experiência ainda mais completa e satisfatória. Abaixo, você encontrará uma pequena amostra das milhares de opções que nossa loja oferece, todas pensadas para o bem-estar e a felicidade do seu amigo de quatro patas. Fique à vontade para explorar e conferir tudo o que temos a oferecer para o seu pet!</p>
    
    <?php  
        include 'conexao.php';

        $dados = $db->query("SELECT * FROM produtos");
        echo "Quantidade de clientes cadastrados: ".$dados->rowCount();
    ?>
    </div>
</body>
<script src="./assets/js/script.js"></script>
</html>
