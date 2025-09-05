<?php 
$subRota = $caminho[1] ?? null;

switch ($subRota) {
    case '':
        require './models/cliente.php';
        $cliente = new Cliente;
        $dados = $cliente->queryAll();
        require './views/clientes/consultaClientes.php';
        break;

    case 'cadastro':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomeCliente = $_POST['nomeCliente'] ?? '';
            $emailCliente = $_POST['emailCliente'] ?? '';
            $senhaCliente = $_POST['senhaCliente'] ?? '';

            require './models/cliente.php';
            $cliente = new Cliente;
            $cliente->insert([
                ":nomeCliente" => $nomeCliente,
                ":emailCliente" => $emailCliente,
                ":senhaCliente" => $senhaCliente
            ]);

            header('Location: /mvc_php/cliente');
            exit;
        }

        require './views/clientes/cadastroCliente.php';
        break;

    case 'excluir':
        // Verifica se o ID foi passado na URL, por exemplo: cliente/excluir/5
        if (isset($caminho[2])) {
            $idCliente = $caminho[2];

            require './models/cliente.php';
            $cliente = new Cliente;
            $cliente->deleteCliente([":idCliente" => $idCliente]);

            header('Location: /mvc_php/cliente');
            exit;
        } else {
            echo "ID do cliente não informado.";
        }
        break;

    default:
        if (preg_match('/^cliente\/([0-9]+)$/', $url, $matches)) {
            $id = $matches[1];

            require './models/cliente.php';
            $cliente = new Cliente;
            $dados = $cliente->queryOne([":idCliente" => $id]);
            require './views/clientes/consultaCliente.php';
        }
        break;
}
