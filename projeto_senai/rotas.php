<?php 
$url = $_GET['url'] ?? '/';
$caminho = explode("/", $url);

switch($caminho[0]) {
    case '':
    case '/':
    case 'home':
        require 'controllers/home.php'; // Tela inicial
        break;

    case 'cliente':
        require 'controllers/cliente.php'; // Exibir clientes cadastrados
        break;

    case 'desaparecido':
        require 'views/clientes/cadastroCliente.php'; // Cadastro de desaparecidos
        break;

    case 'termos':
        require 'views/termos/termos.php'; // Termos
        break;

    case 'configuracoes':
        require 'controllers/configuracoes.php'; // Configurações
        break;

    case 'suporte':
        require 'views/suporte/suporte.php'; // Suporte
        break;

    case 'ajuda':
        require 'views/ajuda/ajuda.php'; // Ajuda
        break;

    case 'feedback':
        require 'views/feedback/feedback.php'; // Feedback
        break;

    case 'nos':
        require 'views/nos/nos.php';
        break;
    
    case 'videos':
        require 'views/video/video.php';
        break;

    case 'ajuda':
        require 'views/ajuda/ajuda.php';
        break;
    
    

    default:
        echo "Rota inválida: " . htmlspecialchars($caminho[0]);
}
