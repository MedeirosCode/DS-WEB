<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="shortcut icon" href="./assetsClientes/imgcliente/dogg.ico" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="./assetsClientes/csscliente/styleCliente.css">
</head>
<body>

    <!-- Menu -->
    <div class="menu">
        <div class="logo">
            <img src="./assetsClientes/imgcliente/logo.png" alt="Logo"> <!-- Ajuste opcional -->
        </div>
        <ul class="ei">
            <li><a href="../index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="clientes.php" class="meumenu meumenu-active" title="Clientes">Clientes</a></li>
            <li><a href="../produtos.php" class="meumenu" title="Produtos">Produtos</a></li>
            <li><a href="../vendas.php" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>

    <!-- Container -->
    <div class="container">
        <?php  
        if ($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET['id'])) {
            header("Location: clientes.php");
            exit;
        }

        include 'conexaoCliente.php';

        $id = $_GET['id'];
        $stmt = $db->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            echo "<p class='erro-input'>Cliente não encontrado.</p>";
            exit;
        }

        $idCliente = $dados['id'];
        $nome = $dados['nome'];
        $email = $dados['email'];
        $observacao = $dados['observacao'];
        ?>

        <!-- Formulário -->
        <div class="formulario">
            <h1>Editar Cliente</h1>
            <form action="alterarCliente.php?id=<?= $idCliente; ?>" method="POST" name="formulario" onsubmit="return validarDadosCliente()">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($nome); ?>">

                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?= htmlspecialchars($email); ?>">

                <label for="observacao">Observação:</label>
                <input type="text" name="observacao" id="observacao" value="<?= htmlspecialchars($observacao); ?>">

                <input type="submit" value="Salvar">
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assetsClientes/jscliente/scriptCliente.js"></script>
    <script src="https://kit.fontawesome.com/128c4fe943.js" crossorigin="anonymous"></script>
</body>
</html>
