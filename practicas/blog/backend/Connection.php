<?php

require_once '../admin/config.php';

class Connection
{
    private static ?PDO $connection = null;
    private static array $config = [
        'host' => DB_CONFIG['host'],
        'dbname' => DB_CONFIG['dbname'],
        'username' => DB_CONFIG['username'],
        'password' => DB_CONFIG['password'],
        'port' => DB_CONFIG['port'],
        'charset' => DB_CONFIG['charset']
    ];

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                $dsn = "mysql:host=" . self::$config['host'] .
                    ";port=" . self::$config['port'] .
                    ";dbname=" . self::$config['dbname'] .
                    ";charset=" . self::$config['charset'];

                self::$connection = new PDO($dsn,
                    self::$config['username'],
                    self::$config['password'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch (PDOException $e) {
                // En un entorno de producción, considera registrar el error en lugar de mostrarlo
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
