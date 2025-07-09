<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once './models/cliente.php';
$clienteModel = new Cliente();

$busca = trim($_GET['buscar_encontrado'] ?? '');
$encontrados = $clienteModel->buscarEncontrados($busca);

if (isset($_GET['buscar_encontrado'])) {
    if (empty($encontrados)) {
        $_SESSION['toast_encontrado'] = [
            'type' => 'error',
            'title' => 'Nenhum resultado',
            'message' => 'Nenhuma pessoa encontrada com esse termo.'
        ];
    } else {
        $_SESSION['toast_encontrado'] = [
            'type' => 'success',
            'title' => 'Sucesso!',
            'message' => 'Resultados encontrados com sucesso!'
        ];
    }
}

require './views/clientes/encontrados.php';
