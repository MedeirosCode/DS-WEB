<?php 
$caminho = explode("/", $url);

// Exemplo: URL "/cliente/cadastrar" → $caminho[0] = "cliente", $caminho[1] = "cadastrar"

switch($caminho[0]) {
    case '':
    case '/':
    case 'home':
        require 'controllers/home.php';
        break;

    case 'cliente':
        if (isset($caminho[1]) && $caminho[1] == 'cadastrar') {
            require 'controllers/clienteCadastrar.php';
        } elseif (isset($caminho[1]) && $caminho[1] == 'editar') {
            require 'controllers/clienteEditar.php'; // se existir
        } else {
            require 'controllers/cliente.php'; // consulta/listagem padrão
        }
        break;

         case 'desaparecido':
        require 'views/clientes/cadastroCliente.php';
        break;


    // Adicione outras rotas conforme necessário
}
