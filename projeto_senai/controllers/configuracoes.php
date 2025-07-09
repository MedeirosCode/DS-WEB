<?php
require_once __DIR__ . '/../models/usuario.php';

$subRota = $caminho[1] ?? '';

switch ($subRota) {
    case '':
        // Verifica se está logado
        if (!isset($_SESSION['usuario'])) {
            header('Location: /projeto_senai/login');
            exit;
        }

        $usuarioModel = new Usuario();
        $idUsuarioLogado = $_SESSION['usuario']['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosOriginais = $_SESSION['usuario'];

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'] ?? '';
            $temFoto = isset($_FILES['foto']) && $_FILES['foto']['error'] !== 4;

            // Verifica se houve alterações
            $mudou = false;
            if ($nome !== $dadosOriginais['nome']) $mudou = true;
            if ($email !== $dadosOriginais['email']) $mudou = true;
            if (!empty($senha)) $mudou = true;
            if ($temFoto) $mudou = true;

            if ($mudou) {
                $params = [
                    ':nome' => $nome,
                    ':email' => $email,
                    ':senha' => $senha,
                    ':id' => $idUsuarioLogado
                ];

                $usuarioModel->atualizarPerfil($params, $_FILES);
                $_SESSION['toast'] = true;
            }

            header('Location: /projeto_senai/configuracoes');
            exit;
        }

        $dados = $_SESSION['usuario'];
        require __DIR__ . '/../views/configuracoes/configuracoes.php';
        break;

    default:
        echo "404 - Página não encontrada";
        break;
}
