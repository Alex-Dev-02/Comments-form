<?php

namespace App\src\ThirdTask\Database;

use PDO;
use PDOException;

/**
 * Класс для подключения к БД
 */
class DB
{
    /**
     * @var DB|null
     */
    private static ?DB $instance = null;

    /**
     * @var PDO
     */
    private PDO $connection;

    private function __construct()
    {
        try {
            $this->connection = new PDO(
                sprintf(
                    'mysql:host=%s;dbname=%s;charset=utf8mb4',
                    $_ENV['DB_HOST'],
                    $_ENV['DB_NAME']
                ),
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD']
            );

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            error_log('Database connection failed: ' . $e->getMessage());

            throw new \RuntimeException('Database connection error');
        }
    }

    private function __clone() { }

    /**
     * Получает объект класса
     *
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Возвращает объект PDO для подключения к БД
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
         return $this->connection;
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return mixed
     */
    public function __call(string $method, array $args): mixed
    {
        if (method_exists($this->connection, $method)) {
            return $this->connection->$method(...$args);
        }

        throw new \BadMethodCallException('Method' . $method . ' does not exist');
    }
}