<?php
$subRota = $caminho[1] ?? null;

switch ($subRota) {
    case '':
        $sucesso = false;

        if (count($_POST) > 0 && isset($_POST['nomeUsuario'])) {
            extract($_POST);
            require_once __DIR__ . '/../models/configuracoes.php';

            $usuario = new Usuario;
            $usuario->atualizaCadastro(
                [
                    ':nomeUsuario' => $nomeUsuario,
                    ':emailUsuario' => $emailUsuario,
                    ':senhaUsuario' => $senhaUsuario ?? ''
                ],
                $_FILES
            );

            $sucesso = true;
        }

        require_once __DIR__ . '/../models/configuracoes.php';
        $usuario = new Usuario;
        $dados = $usuario->queryOne([':idUsuario' => 1]);

        require __DIR__ . '/../views/configuracoes/configuracoes.php';
        break;

    default:
        echo "404 - Página não encontrada";
        break;
}
// Fim do arquivo controllers/configuracoes.php