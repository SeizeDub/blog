<?php
namespace App\src\DAO;
use PDO;
use Exception;

abstract class DAO {
    const DB_HOST = "mysql:host=localhost;dbname=cours_blog;charset=utf8";
    const DB_USER = "root";
    const DB_PASS = "";
    private $connection;

    private function getConnection() {
        if (!$this->connection) {
            return $this->connect();
        }
        return $this->connection;
    }

    private function connect() {
        try {
            $this->connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (Exception $e) {
            die('Erreur de connexion : '.$e->getMessage());
        }
    }

    protected function createQuery($sql, $params = null) {
        $result = $this->getConnection()->prepare($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        $result->execute($params);
        return $result;
    }
}