<?php

require './models/database.php';

class Cliente {
    private $conexao;

    public function __construct(){
        $this->conexao = new Database;
    }

    public function queryOne($parameters){
        $resultado = $this->conexao->executeQuery("SELECT * FROM clientes WHERE idCliente = :idCliente", $parameters);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function queryAll(){
        $resultado = $this->conexao->executeQuery("SELECT * FROM clientes");
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function insert($parameters){
        $sql = "INSERT INTO clientes (nomeCliente, emailCliente, senhaCliente) 
                VALUES (:nomeCliente, :emailCliente, :senhaCliente)";
        return $this->conexao->executeCliente($sql, $parameters);
    }

    public function deleteCliente($parameters){
    $sql = "DELETE FROM clientes WHERE idCliente = :idCliente";
    return $this->conexao->deleteCliente($sql, $parameters);
}


}
