<?php

require './models/database.php';

class Produto {
    private $conexao;

    public function __construct(){
        $this->conexao = new Database;
    }

    public function queryOne($parameters){
        $resultado = $this->conexao->executeQuery("SELECT * FROM produtos WHERE idProduto = :idProduto", $parameters);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function queryAll(){
        $resultado = $this->conexao->executeQuery("SELECT * FROM produtos");
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function insert($parameters){
        $sql = "INSERT INTO produtos (nomeProduto, precoProduto, estoqueProduto) 
                VALUES (:nomeProduto, :precoProduto, :estoqueProduto)";
        return $this->conexao->executeNonQuery($sql, $parameters);
    }

    public function executeDelete($parameters){
    $sql = "DELETE FROM produtos WHERE idProduto = :idProduto";
    return $this->conexao->executeDelete($sql, $parameters);
}


}
