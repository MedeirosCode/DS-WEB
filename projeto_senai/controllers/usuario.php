<?php
$subRota = $caminho[1] ?? null; //Verifica se há algo na segunda rota

switch($subRota){
    case '':
        if(count($_POST) > 0 && isset($_FILES['fotoUsuario'])){
        // Verifica se o formulário foi enviado
        // e se o campo de foto foi preenchido
        extract($_POST);

        // Verifica se o campo de foto foi preenchido
        require_once ('./models/usuario.php');

        
        $usuario = new Usuario;
       $usuario->atualizaCadastro(
    [
        ':nomeUsuario' => $nomeUsuario,
        ':emailUsuario' => $emailUsuario,
        ':senhaUsuario' => $senhaUsuario,
        ':altura' => $altura,
        ':sexo' => $sexo,
        ':dataNascimento' => $dataNascimento,
        ':localizacao' => $localizacao,
        ':caracteristicas' => $caracteristicas,
        ':raca' => $raca,
        ':fotoUsuario' => $_FILES['fotoUsuario']['name'],
        ':idUsuario' => 1 // Supondo que o ID do usuário seja 1
    ],
    $_FILES
);


    }
        require_once './models/usuario.php';
        $usuario = new Usuario;
        $dados = $usuario->queryOne([':idUsuario' => 1]);
        require './views/usuario/usuario.php';
        
        break;


    default:
        echo "404 - Página não encontrada";
        break;
}