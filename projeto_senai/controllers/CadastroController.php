<?php
// controllers/cadastroController.php
require_once __DIR__ . '/../models/Login.php';

class CadastroController {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new Login();
    }

    public function cadastro() {
        $erro = '';
        $sucesso = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome' => $_POST['nome'] ?? '',
                'email' => $_POST['email'] ?? '',
                'senha' => $_POST['senha'] ?? '',
                'tipo' => 'publico',
                'foto' => null
            ];

            try {
                $this->loginModel->cadastrar($dados, $_FILES['foto'] ?? null);
                $_SESSION['cadastro_sucesso'] = true;
                header('Location: /projeto_senai/cadastro');
                exit;
            } catch (Exception $e) {
                $_SESSION['cadastro_erro'] = $e->getMessage();
                header('Location: /projeto_senai/cadastro');
                exit;
            }
        }

        require __DIR__ . '/../views/cadastro/cadastro.php';
    }
}
