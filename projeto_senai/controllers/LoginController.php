<?php
require_once __DIR__ . '/../models/Login.php';


class LoginController {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new Login();
    }

    public function login() {
        $erro = '';
        $sucesso = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $usuario = $this->loginModel->autenticar($email, $senha);
            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                setcookie('usuario_id', $usuario['id'], time() + 86400 * 30, "/");

                // Define mensagem de sucesso (sem redirecionar ainda)
                $sucesso = "Login realizado com sucesso!";
            } else {
                $erro = 'Email ou senha incorretos.';
            }
        }

        require __DIR__ . '/../views/login/login.php';
    }

    public function logout() {
    session_start();
    session_destroy();
    setcookie('usuario_id', '', time() - 3600, "/");

    // Redireciona para a tela de login com parâmetro para exibir o SweetAlert
    header('Location: /projeto_senai/login?logout=1');
    exit;
}

}
