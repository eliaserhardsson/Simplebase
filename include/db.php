<?php

class db {
    private const host = 'localhost';
    private const USERNAME = '';
    private const PASSWORD = '';
    private const db = '';

    private PDO $pdo;

    public function __construct() {
        $dsn = 'mysql:host='. SELF::host . ';dbname=' . SELF::db . ';charset=utf8mb4';
        $pdo = new PDO($dsn, SELF::USERNAME, SELF::PASSWORD);
        $this->pdo = $pdo;
    }

    public function select($query, $parameters): array {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($parameters);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function query($query, $parameters): void {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($parameters);
    }

    public static function staticSelect($query, $parameters): array {
        $dsn = 'mysql:host='. SELF::host . ';dbname=' . SELF::db . ';charset=utf8mb4';
        $pdo = new PDO($dsn, SELF::USERNAME, SELF::PASSWORD);
        $stmt = $pdo->prepare($query);
        $stmt->execute($parameters);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function staticQuery($query, $parameters): void {
        $dsn = 'mysql:host='. SELF::host . ';dbname=' . SELF::db . ';charset=utf8mb4';
        $pdo = new PDO($dsn, SELF::USERNAME, SELF::PASSWORD);
        $stmt = $pdo->prepare($query);
        $stmt->execute($parameters);
    }
}