<?php
require_once __DIR__ . '/database.php';

class Usuario {
    private $conexao;

    public function __construct() {
        $this->conexao = new Database();
    }

    public function queryOne(array $parameters = []) {
        $stmt = $this->conexao->executeQuery("SELECT * FROM login WHERE id = :id", $parameters);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function cadastrar(array $dados) {
        // Verifica se email já existe
        $existe = $this->conexao->executeQuery(
            "SELECT COUNT(*) as total FROM login WHERE email = :email",
            [':email' => $dados['email']]
        )->fetch(\PDO::FETCH_ASSOC);

        if ($existe && $existe['total'] > 0) {
            throw new \Exception("Email já cadastrado.");
        }

        $senhaHash = password_hash($dados['senha'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO login (nome, email, senha) VALUES (:nome, :email, :senha)";
        $params = [
            ':nome' => $dados['nome'],
            ':email' => $dados['email'],
            ':senha' => $senhaHash
        ];

        $this->conexao->executeQuery($sql, $params);
        return true;
    }

    public function autenticar(string $email, string $senha) {
        $stmt = $this->conexao->executeQuery(
            "SELECT * FROM login WHERE email = :email",
            [':email' => $email]
        );

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }

        return false;
    }

    public function atualizarPerfil(array $dados, array $FILE = []) {
        if (empty($dados[':id'])) {
            throw new \Exception("ID do usuário não informado para atualização.");
        }

        $_UP = [
            "pasta" => __DIR__ . '/../photos/',
            "tamanho" => 1024 * 1024 * 2, // 2MB
            "extensoes" => ['jpeg', 'jpg', 'png', 'gif'],
            "renomeia" => false,
            "erros" => [
                0 => "Não houve erro",
                1 => "O arquivo no upload é maior do que o limite do PHP",
                2 => "O arquivo ultrapassa o limite de tamanho especificado no HTML",
                3 => "O upload do arquivo foi feito parcialmente",
                4 => "Não foi feito o upload do arquivo"
            ]
        ];

        $usuarioAtual = $this->queryOne([':id' => $dados[':id']]);
        if (!$usuarioAtual) {
            throw new \Exception("Usuário não encontrado.");
        }

        $sqlFoto = "";

        if (isset($FILE["foto"]) && $FILE["foto"]["error"] !== 4) {
            if ($FILE["foto"]["error"] !== 0) {
                throw new \Exception("Erro no upload: " . ($_UP["erros"][$FILE["foto"]["error"]] ?? 'Erro desconhecido'));
            }

            $ext = strtolower(pathinfo($FILE["foto"]["name"], PATHINFO_EXTENSION));

            if (!in_array($ext, $_UP["extensoes"])) {
                throw new \Exception("Extensão inválida. Envie arquivos jpg, jpeg, png ou gif.");
            }

            if ($FILE["foto"]["size"] > $_UP["tamanho"]) {
                throw new \Exception("Arquivo muito grande. Máximo permitido: 2MB.");
            }

            $nomeFoto = $_UP["renomeia"] ? time() . '.jpg' : basename($FILE["foto"]["name"]);
            $caminhoCompleto = $_UP["pasta"] . $nomeFoto;

            if (!move_uploaded_file($FILE["foto"]["tmp_name"], $caminhoCompleto)) {
                throw new \Exception("Erro ao mover arquivo para destino final.");
            }

            $dados[':foto'] = $nomeFoto;
            $sqlFoto = ", foto = :foto";
        }

        // Se senha estiver vazia, manter a atual
        if (!empty($dados[':senha'])) {
            $dados[':senha'] = password_hash($dados[':senha'], PASSWORD_DEFAULT);
        } else {
            $dados[':senha'] = $usuarioAtual['senha'];
        }

        $sql = "UPDATE login SET nome = :nome, email = :email, senha = :senha" . $sqlFoto . " WHERE id = :id";

        $this->conexao->executeQuery($sql, $dados);

        // Atualiza a sessão
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION['usuario'] = $this->queryOne([':id' => $dados[':id']]);
        }
    }
}
