<?php 
$subRota = $caminho[1] ?? null;

switch ($subRota) {
    case '':
        require './models/produto.php';
        $produto = new Produto;
        $dados = $produto->queryAll();
        require './views/produtos/consultaProdutos.php';
        break;

    case 'cadastro':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomeProduto = $_POST['nomeProduto'] ?? '';
            $precoProduto = $_POST['precoProduto'] ?? '';
            $estoqueProduto = $_POST['estoqueProduto'] ?? '';

            require './models/produto.php';
            $produto = new Produto;
            $produto->insert([
                ":nomeProduto" => $nomeProduto,
                ":precoProduto" => $precoProduto,
                ":estoqueProduto" => $estoqueProduto
            ]);

            header('Location: /mvc_php/produto');
            exit;
        }

        require './views/produtos/cadastroProduto.php';
        break;

    case 'excluir':
        // Verifica se o ID foi passado na URL, por exemplo: produto/excluir/5
        if (isset($caminho[2])) {
            $idProduto = $caminho[2];

            require './models/produto.php';
            $produto = new Produto;
            $produto->executeDelete([":idProduto" => $idProduto]);

            header('Location: /mvc_php/produto');
            exit;
        } else {
            echo "ID do produto não informado.";
        }
        break;

    default:
        if (preg_match('/^produto\/([0-9]+)$/', $url, $matches)) {
            $id = $matches[1];

            require './models/produto.php';
            $produto = new Produto;
            $dados = $produto->queryOne([":idProduto" => $id]);
            require './views/produtos/consultaProduto.php';
        }
        break;
}
