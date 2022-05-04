<?php 
function get_pdo()
{
    $dsn = 'mysql:host=localhost;dbname=translation;charset=utf8mb4';
    $options = [
        \PDO::ATTR_PERSISTENT => true,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    ];

    try {
        return new \PDO($dsn, 'root', 'root', $options);
    } catch (\PDOException $e) {
        exit($e->getMessage());
    }
}