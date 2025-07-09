<?php

class Database extends PDO
{
    private $DB_NAME = 'mvc_db';
    private $DB_USER = 'root';
    private $DB_PASSWORD = '';
    private $DB_HOST = '127.0.0.1';
    private $DB_PORT = 3306;

    public function __construct()
    {
        parent::__construct(
            "mysql:host={$this->DB_HOST};dbname={$this->DB_NAME};port={$this->DB_PORT}",
            $this->DB_USER,
            $this->DB_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    private function setParameters($stmt, $key, $value)
    {
        if (is_int($key)) {
            // Para placeholders posicionais ? bindValue começa em 1
            $stmt->bindValue($key + 1, $value);
        } else {
            // Para placeholders nomeados
            $stmt->bindValue($key, $value);
        }
    }

    private function mountQuery($stmt, $parameters)
    {
        foreach ($parameters as $key => $value) {
            $this->setParameters($stmt, $key, $value);
        }
    }

    public function executeQuery(string $query, array $parameters = [])
    {
        $stmt = $this->prepare($query);
        $this->mountQuery($stmt, $parameters);
        $stmt->execute();
        return $stmt;
    }

    public function executeNonQuery($sql, $params = [])
    {
        $stmt = $this->prepare($sql);
        return $stmt->execute($params);
    }

    public function fetchAllAssoc(string $query, array $params = [])
    {
        $stmt = $this->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function lastInsertId(?string $name = null): string|false
    {
        return parent::lastInsertId($name);
    }

    public function getConnection()
    {
        return $this;
    }
}
