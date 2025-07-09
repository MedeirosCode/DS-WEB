<?php
require_once __DIR__ . '/database.php';

class Cliente {
    private $conexao;

    public function __construct() {
        $this->conexao = new Database();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM clientes WHERE idCliente = :id";
        $stmt = $this->conexao->executeQuery($sql, [':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvarRelato($idCliente, $relato) {
        try {
            $sql = "UPDATE clientes SET relatos = :relato WHERE idCliente = :id";
            $stmt = $this->conexao->executeQuery($sql, [
                ':relato' => $relato,
                ':id' => $idCliente
            ]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log('Erro ao salvar relato: ' . $e->getMessage());
            return false;
        }
    }

    public function buscarEncontrados($termo = '') {
    $sql = "SELECT * FROM clientes 
            WHERE encontrado_em IS NOT NULL";

    if (!empty($termo)) {
        $sql .= " AND (nomeCliente LIKE :termo OR cidade LIKE :termo OR estado LIKE :termo)";
        $params = [':termo' => '%' . $termo . '%'];
    } else {
        $params = [];
    }

    $sql .= " ORDER BY encontrado_em DESC";
    $stmt = $this->conexao->executeQuery($sql, $params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function queryAll() {
        $sql = "SELECT * FROM clientes ORDER BY nomeCliente ASC";
        $resultado = $this->conexao->executeQuery($sql);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarComTermo($termo) {
        if (empty($termo)) {
            return $this->queryAll();
        }

        $sql = "SELECT * FROM clientes 
                WHERE (nomeCliente LIKE :termo OR cidade LIKE :termo OR estado LIKE :termo)
                AND encontrado_em IS NULL
                ORDER BY nomeCliente ASC";

        $stmt = $this->conexao->executeQuery($sql, [
            ':termo' => '%' . $termo . '%'
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($parameters) {
        try {
            if (isset($_FILES['fotoCliente']) && $_FILES['fotoCliente']['error'] === 0) {
                $nomeImagem = time() . '_' . $_FILES['fotoCliente']['name'];
                $caminhoDestino = __DIR__ . '/../photos/' . $nomeImagem;
                move_uploaded_file($_FILES['fotoCliente']['tmp_name'], $caminhoDestino);
                $parameters[':fotoCliente'] = $nomeImagem;
            } else {
                $parameters[':fotoCliente'] = null;
            }

            $sql = "INSERT INTO clientes 
            (nomeCliente, fotoCliente, emailCliente, altura, sexo, dataNascimento, localizacao, caracteristicas, raca, idadeAproximada, dataDesaparecimento, cidade, estado, pais, ultimaRoupaVista, nomeResponsavel, telefoneResponsavel, parentescoResponsavel, observacao, usuario_id)
            VALUES 
            (:nomeCliente, :fotoCliente, :emailCliente, :altura, :sexo, :dataNascimento, :localizacao, :caracteristicas, :raca, :idadeAproximada, :dataDesaparecimento, :cidade, :estado, :pais, :ultimaRoupaVista, :nomeResponsavel, :telefoneResponsavel, :parentescoResponsavel, :observacao, :usuario_id)";

            $stmt = $this->conexao->executeQuery($sql, $parameters);
            return $this->conexao->lastInsertId();
        } catch (PDOException $e) {
            error_log('Erro ao inserir cliente: ' . $e->getMessage());
            return false;
        }
    }

    public function marcarComoEncontrado($id) {
        $sql = "UPDATE clientes SET encontrado_em = NOW() WHERE idCliente = :id";
        $stmt = $this->conexao->executeQuery($sql, [':id' => $id]);
        return $stmt->rowCount() > 0;
    }
}
