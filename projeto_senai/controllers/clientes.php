<?php 
$subRota = $caminho[1] ?? null;

switch ($subRota) {
    case '':
        require '../models/clientes.php';
        $cliente = new Cliente;
        $dados = $cliente->queryAll();
        require '../views/clientes/consultaCliente.php'; // Corrigido: para listar os clientes
        break;

    case 'cadastro':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomeCliente = $_POST['nomeCliente'] ?? '';
            $emailCliente = $_POST['emailCliente'] ?? '';
            $senhaCliente = $_POST['senhaCliente'] ?? '';
            $altura = $_POST['altura'] ?? '';
            $sexo = $_POST['sexo'] ?? '';
            $data = $_POST['data'] ?? '';
            $localizacao = $_POST['localizacao'] ?? '';
            $caracteristicas = $_POST['caracteristicas'] ?? '';
            $raca = $_POST['raca'] ?? '';

            require './models/clientess.php';
            $cliente = new Cliente;
            $cliente->insert([
                ":nomeCliente" => $nomeCliente,
                ":emailCliente" => $emailCliente,
                ":senhaCliente" => $senhaCliente,
                ":altura" => $altura,
                ":sexo" => $sexo,
                ":data" => $data,
                ":localizacao" => $localizacao,
                ":caracteristicas" => $caracteristicas,
                ":raca" => $raca
            ]);

            header('Location: /projeto_senai/controllers/cliente');
            exit;
        }

        require './views/clientes/cadastroCliente.php';
        break;

    case 'excluir':
        if (isset($caminho[2])) {
            $idCliente = $caminho[2];

            require './models/cliente.php';
            $cliente = new Cliente;
            $cliente->deleteCliente([":idCliente" => $idCliente]);

            header('Location: /projeto_senai/controller/cliente');
            exit;
        } else {
            echo "ID do cliente não informado.";
        }
        break;

    default:
        if (preg_match('/^cliente\/([0-9]+)$/', $url, $matches)) {
            $id = $matches[1];

            require '../models/cliente.php';
            $cliente = new Cliente;
            $dados = $cliente->queryOne([":idCliente" => $id]);
            require './views/clientes/consultaCliente.php';
        }
        break;
}
