<?php
// Nome do arquivo que vai guardar o valor
$arquivo = "estado.txt";

// Se o arquivo não existir, cria com valor inicial 0
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, "0");
}

// Quando clicar no botão
if (isset($_POST['alternar'])) {
    $valor_atual = trim(file_get_contents($arquivo));
    $novo_valor = ($valor_atual === "0") ? "1" : "0";
    file_put_contents($arquivo, $novo_valor);
}

// Lê novamente para mostrar na tela
$estado = trim(file_get_contents($arquivo));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alternar 0 e 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }
        .estado {
            font-size: 3rem;
            font-weight: bold;
            color: #00ffcc;
            margin-bottom: 30px;
            transition: 0.3s;
        }
        button {
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            background: linear-gradient(135deg, #00ffcc, #00b894);
            color: #000;
            transition: 0.3s;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.2);
        }
        button:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 20px rgba(0,0,0,0.4);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Valor atual</h2>
        <div class="estado"><?php echo $estado; ?></div>
        <form method="post">
            <button type="submit" name="alternar">Alternar</button>
        </form>
    </div>
</body>
</html>
