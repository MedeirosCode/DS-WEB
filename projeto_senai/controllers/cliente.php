<?php

$subRota = $caminho[1] ?? '';

require_once './models/cliente.php';
$clienteModel = new Cliente();

switch ($subRota) {
    case '':
        $busca = trim($_GET['busca_desaparecido'] ?? '');
        $dados = $clienteModel->buscarComTermo($busca);

        if (isset($_GET['busca_desaparecido'])) {
            $_SESSION['toast'] = [
                'type' => empty($dados) ? 'error' : 'success',
                'title' => empty($dados) ? 'Nenhum resultado encontrado' : 'Sucesso!',
                'message' => empty($dados)
                    ? 'Nenhuma pessoa desaparecida com esse termo.'
                    : 'Resultados encontrados!'
            ];
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
                ':observacao' => $_POST['observacao'],
                ':usuario_id' => $_SESSION['usuario']['id'] ?? null
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
                } else {
                    $_SESSION['toast'] = [
                        'type' => 'error',
                        'title' => 'Erro',
                        'message' => 'O campo de relato não pode estar vazio.'
                    ];
                }

                header("Location: /projeto_senai/cliente/detalhes/$id");
                exit;
            }

            $cliente = $clienteModel->buscarPorId($id);
            if ($cliente) {
                require './views/clientes/detalhesCliente.php';
            } else {
                $_SESSION['toast'] = [
                    'type' => 'error',
                    'title' => 'Erro!',
                    'message' => 'Cliente não encontrado.'
                ];
                header('Location: /projeto_senai/cliente');
                exit;
            }
        } else {
            $_SESSION['toast'] = [
                'type' => 'error',
                'title' => 'Erro!',
                'message' => 'ID inválido.'
            ];
            header('Location: /projeto_senai/cliente');
            exit;
        }
        break;

    case 'encontrado':
        $id = $caminho[2] ?? null;
        if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = $clienteModel->buscarPorId($id);
            if ($cliente && $_SESSION['usuario']['id'] == $cliente['usuario_id']) {
                $clienteModel->marcarComoEncontrado($id);
                $_SESSION['toast'] = [
                    'type' => 'success',
                    'title' => 'Pessoa marcada como encontrada!',
                    'message' => 'A imagem será mantida na aba Encontrados.'
                ];
            } else {
                $_SESSION['toast'] = [
                    'type' => 'error',
                    'title' => 'Ação não permitida',
                    'message' => 'Você não tem permissão para marcar esta pessoa.'
                ];
            }
            header("Location: /projeto_senai/cliente");
            exit;
        } else {
            $_SESSION['toast'] = [
                'type' => 'error',
                'title' => 'Erro!',
                'message' => 'Requisição inválida.'
            ];
            header("Location: /projeto_senai/cliente");
            exit;
        }
        break;

    default:
        $_SESSION['toast'] = [
            'type' => 'error',
            'title' => 'Erro!',
            'message' => 'Subrota cliente inválida.'
        ];
        header('Location: /projeto_senai/cliente');
        exit;
}
