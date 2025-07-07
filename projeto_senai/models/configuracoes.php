<?php

require_once __DIR__ . '/database.php';

class Usuario {
    private $conexao;

    public function __construct() {
        $this->conexao = new Database;
    }

    public function queryOne(array $parameters = []) {
        $resultado = $this->conexao->executeQuery("SELECT * FROM usuarios WHERE idUsuario = :idUsuario", $parameters);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizaCadastro(array $parameters = [], array $FILE = []) {
        $_UP["pasta"] = __DIR__ . '/../photos/';
        $_UP["tamanho"] = 1024 * 1024 * 2; // 2MB
        $_UP["extensoes"] = ['jpeg', 'jpg', 'png', 'gif'];
        $_UP["renomeia"] = false;
        $_UP["erros"] = [
            0 => "Não houve erro",
            1 => "O arquivo no upload é maior do que o limite do PHP",
            2 => "O arquivo ultrapassa o limite de tamanho especificado no HTML",
            3 => "O upload do arquivo foi feito parcialmente",
            4 => "Não foi feito o upload do arquivo"
        ];

        $dadosAtuais = $this->queryOne([':idUsuario' => 1]);
        $sqlFoto = "";

        // Verifica se uma nova imagem foi enviada
        if (isset($FILE["fotoUsuario"]) && $FILE["fotoUsuario"]["error"] !== 4) {
            if ($FILE["fotoUsuario"]["error"] !== 0) {
                die("Não foi possível fazer o upload. Erro: " . $_UP["erros"][$FILE["fotoUsuario"]["error"]]);
            }

            $ext = strtolower(pathinfo($FILE["fotoUsuario"]["name"], PATHINFO_EXTENSION));

            if (!in_array($ext, $_UP["extensoes"])) {
                echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
                exit;
            }

            if ($FILE["fotoUsuario"]["size"] > $_UP["tamanho"]) {
                echo "O arquivo enviado é muito grande. Envie arquivos de até 2 MB";
                exit;
            }

            $fotoUsuario = $_UP["renomeia"] ? time() . '.jpg' : $FILE["fotoUsuario"]["name"];

            if (move_uploaded_file($FILE["fotoUsuario"]["tmp_name"], $_UP["pasta"] . $fotoUsuario)) {
                $parameters[':fotoUsuario'] = $fotoUsuario;
                $sqlFoto = ", fotoUsuario = :fotoUsuario";
            } else {
                echo "Não foi possível enviar o arquivo, tente novamente";
                exit;
            }
        }

        // Criptografar nova senha, ou manter a atual
        if (!empty($parameters[':senhaUsuario'])) {
            $parameters[':senhaUsuario'] = password_hash($parameters[':senhaUsuario'], PASSWORD_DEFAULT);
        } else {
            $parameters[':senhaUsuario'] = $dadosAtuais['senhaUsuario'];
        }

        // Query SQL com ou sem foto
        $sql = "UPDATE usuarios SET nomeUsuario = :nomeUsuario, emailUsuario = :emailUsuario, senhaUsuario = :senhaUsuario" . $sqlFoto . " WHERE idUsuario = 1";

        // Executa a atualização
        $this->conexao->executeQuery($sql, $parameters);
    }
}
