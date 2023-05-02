<?php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct($dsn, $username, $password, $options) {
        $this->pdo = new PDO($dsn, $username, $password, $options);
    }

    public static function getInstance() {
        if (!self::$instance) {
            $dsn = 'mysql:host=localhost;dbname=ipial_website';
            $username = 'root';
            $password = '';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            self::$instance = new Database($dsn, $username, $password, $options);
        }
        return self::$instance;
    }

    public function getPdo() {
        return $this->pdo;
    }

    private function __clone() {}
}

?>