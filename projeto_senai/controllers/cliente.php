<?php

$subRota = $caminho[1] ?? '';

require_once './models/cliente.php';
$clienteModel = new Cliente();

switch ($subRota) {
    case '':
        $busca = trim($_GET['busca'] ?? '');

        $dados = $clienteModel->buscarComTermo($busca);

        // Verifica se houve uma busca
        if ($busca !== '') {
            if (empty($dados)) {
                $_SESSION['toast'] = [
                    'type' => 'error',
                    'title' => 'Nenhum resultado encontrado',
                    'message' => 'Nenhum usuário encontrado com esse termo.'
                ];
            } else {
                $_SESSION['toast'] = [
                    'type' => 'success',
                    'title' => 'Sucesso',
                    'message' => 'Resultados encontrados!'
                ];
            }
        }

        require './views/clientes/consultaClientes.php';
        break;

    case 'cadastro':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $campos = [
                ':nomeCliente' => $_POST['nomeCliente'],
                ':emailCliente' => $_POST['emailCliente'],
                ':altura' => $_POST['altura'],
                ':sexo' => $_POST['sexo'],
                ':dataNascimento' => $_POST['dataNascimento'],
                ':localizacao' => $_POST['localizacao'],
                ':caracteristicas' => $_POST['caracteristicas'],
                ':raca' => $_POST['raca'],
                ':idadeAproximada' => $_POST['idadeAproximada'],
                ':dataDesaparecimento' => $_POST['dataDesaparecimento'],
                ':cidade' => $_POST['cidade'],
                ':estado' => $_POST['estado'],
                ':pais' => $_POST['pais'],
                ':ultimaRoupaVista' => $_POST['ultimaRoupaVista'],
                ':nomeResponsavel' => $_POST['nomeResponsavel'],
                ':telefoneResponsavel' => $_POST['telefoneResponsavel'],
                ':parentescoResponsavel' => $_POST['parentescoResponsavel'],
                ':observacao' => $_POST['observacao']
            ];

            $resultado = $clienteModel->insert($campos);
            $_SESSION['toast'] = [
                'type' => $resultado ? 'success' : 'error',
                'title' => $resultado ? 'Sucesso!' : 'Erro!',
                'message' => $resultado ? 'Cliente cadastrado com sucesso!' : 'Falha ao cadastrar cliente.'
            ];
            header('Location: /projeto_senai/cliente');
            exit;
        } else {
            require './views/clientes/cadastroClientes.php';
        }
        break;

    case 'detalhes':
        $id = $caminho[2] ?? null;
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['relato'])) {
                $relato = trim($_POST['relato']);
                if (!empty($relato)) {
                    $clienteModel->salvarRelato($id, $relato);
                    $_SESSION['toast'] = ['type' => 'success', 'title' => 'Sucesso', 'message' => 'Relato salvo com sucesso!'];
                } else {
                    $_SESSION['toast'] = ['type' => 'error', 'title' => 'Erro', 'message' => 'O campo de relato não pode estar vazio.'];
                }

                header("Location: /projeto_senai/cliente/detalhes/$id");
                exit;
            }

            $cliente = $clienteModel->buscarPorId($id);
            if ($cliente) {
                require './views/clientes/detalhesCliente.php';
            } else {
                $_SESSION['toast'] = ['type' => 'error', 'title' => 'Erro!', 'message' => 'Cliente não encontrado.'];
                header('Location: /projeto_senai/cliente');
                exit;
            }
        } else {
            $_SESSION['toast'] = ['type' => 'error', 'title' => 'Erro!', 'message' => 'ID inválido.'];
            header('Location: /projeto_senai/cliente');
            exit;
        }
        break;

    default:
        $_SESSION['toast'] = ['type' => 'error', 'title' => 'Erro!', 'message' => 'Subrota cliente inválida.'];
        header('Location: /projeto_senai/cliente');
        exit;
}
