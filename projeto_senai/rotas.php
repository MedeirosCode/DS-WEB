<?php

$url = $_GET['url'] ?? '/';
$caminho = explode('/', trim($url, '/'));

switch ($caminho[0]) {
    // Páginas públicas
    case '':
    case 'home':
        require 'controllers/home.php';
        break;

    case 'login':
        require 'controllers/LoginController.php';
        $controller = new LoginController();
        $controller->login();
        break;

    case 'logout':
        require 'controllers/LoginController.php';
        $controller = new LoginController();
        $controller->logout();
        break;

    case 'cadastro':
        require 'controllers/CadastroController.php';
        $controller = new CadastroController();
        $controller->cadastro();
        break;

    // Área restrita (acesso para qualquer usuário logado)
    case 'configuracoes':
        if (!isset($_SESSION['usuario'])) {
            header('Location: /projeto_senai/login');
            exit;
        }

        require 'controllers/configuracoes.php';
        break;

    // Cliente (Cadastro, Consulta, Detalhes)
    case 'cliente':
        require 'controllers/cliente.php';
        break;

    // Outras páginas públicas
    case 'videos':
        require 'views/video/video.php';
        break;

    case 'suporte':
        require 'views/suporte/suporte.php';
        break;

    case 'ajuda':
        require 'views/ajuda/ajuda.php';
        break;

    case 'feedback':
        require 'views/feedback/feedback.php';
        break;

    case 'nos':
        require 'views/nos/nos.php';
        break;

    case 'termos':
        require 'views/termos/termos.php';
        break;

    case 'desaparecidos':
        require 'views/clientes/cadastroCliente.php';
        break;

    case 'configuracao':
        require 'controllers/configuracoes.php';
        break;

    case 'encontrados':
    require 'controllers/encontrados.php';
    break;


    default:
        echo "Rota inválida: " . htmlspecialchars($caminho[0]);
        break;
}
