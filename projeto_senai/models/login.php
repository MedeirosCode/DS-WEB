<?php
require_once __DIR__ . '/database.php';

class Login {
    private $conexao;

    public function __construct() {
        $this->conexao = new Database();
    }

    public function cadastrar(array $dados, $file = null) {
        // Verifica email duplicado
        $existe = $this->conexao->executeQuery(
            "SELECT COUNT(*) as total FROM login WHERE email = :email",
            [':email' => $dados['email']]
        )->fetch(PDO::FETCH_ASSOC);

        if ($existe['total'] > 0) {
            throw new Exception("Email já cadastrado.");
        }

        $senhaHash = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $fotoNome = 'user.png'; // Imagem padrão

        // Se o usuário enviou uma imagem válida
        if ($file && $file['error'] === 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $validExt = ['jpeg', 'jpg', 'png', 'gif'];

            if (!in_array(strtolower($ext), $validExt)) {
                throw new Exception("Formato inválido para foto.");
            }

            if ($file['size'] > 2 * 1024 * 1024) {
                throw new Exception("Foto muito grande. Máximo 2MB.");
            }

            $fotoNome = time() . '.' . $ext;
            move_uploaded_file($file['tmp_name'], __DIR__ . '/../photos/' . $fotoNome);
        }

        $sql = "INSERT INTO login (nome, email, senha, tipo, criado_em, foto)
                VALUES (:nome, :email, :senha, :tipo, NOW(), :foto)";
        $params = [
            ':nome' => $dados['nome'],
            ':email' => $dados['email'],
            ':senha' => $senhaHash,
            ':tipo' => $dados['tipo'],
            ':foto' => $fotoNome
        ];

        $this->conexao->executeQuery($sql, $params);
    }

    public function autenticar(string $email, string $senha) {
        $stmt = $this->conexao->executeQuery(
            "SELECT * FROM login WHERE email = :email",
            [':email' => $email]
        );
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }

    public function atualizarPerfil(array $dados, $file = null) {
        if (empty($dados[':id'])) {
            throw new Exception("ID não informado.");
        }

        $usuario = $this->conexao->executeQuery(
            "SELECT * FROM login WHERE id = :id",
            [':id' => $dados[':id']]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) throw new Exception("Usuário não encontrado.");

        $params = [
            ':id' => $dados[':id'],
            ':nome' => $dados[':nome'],
            ':email' => $dados[':email'],
        ];

        $sql = "UPDATE login SET nome = :nome, email = :email";

        if (!empty($dados[':senha'])) {
            $params[':senha'] = password_hash($dados[':senha'], PASSWORD_DEFAULT);
            $sql .= ", senha = :senha";
        }

        if ($file && $file['error'] === 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $validExt = ['jpeg', 'jpg', 'png', 'gif'];

            if (!in_array(strtolower($ext), $validExt)) {
                throw new Exception("Formato inválido para foto.");
            }

            if ($file['size'] > 2 * 1024 * 1024) {
                throw new Exception("Foto muito grande. Máximo 2MB.");
            }

            $fotoNome = time() . '.' . $ext;
            move_uploaded_file($file['tmp_name'], __DIR__ . '/../photos/' . $fotoNome);
            $sql .= ", foto = :foto";
            $params[':foto'] = $fotoNome;
        }

        $sql .= " WHERE id = :id";
        $this->conexao->executeQuery($sql, $params);
    }

    public function armazenarToken($email, $token, $expira) {
        $usuario = $this->conexao->executeQuery(
            "SELECT id FROM login WHERE email = :email",
            [':email' => $email]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) return false;

        $this->conexao->executeQuery("
            INSERT INTO redefinicoes (user_id, token, expira_em)
            VALUES (:id, :token, :expira)
        ", [
            ':id' => $usuario['id'],
            ':token' => $token,
            ':expira' => $expira
        ]);

        return true;
    }

    public function redefinirSenha($token, $novaSenha) {
        $registro = $this->conexao->executeQuery(
            "SELECT user_id FROM redefinicoes 
             WHERE token = :token AND expira_em > NOW()",
            [':token' => $token]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$registro) throw new Exception("Token inválido ou expirado");

        $hash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $this->conexao->executeQuery(
            "UPDATE login SET senha = :senha WHERE id = :id",
            [':senha' => $hash, ':id' => $registro['user_id']]
        );

        $this->conexao->executeQuery(
            "DELETE FROM redefinicoes WHERE token = :token",
            [':token' => $token]
        );
    }
}
