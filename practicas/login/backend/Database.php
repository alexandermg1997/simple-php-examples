<?php

class Database
{
    private static ?PDO $connection = null;
    private static array $config = [
        'host' => 'localhost',
        'dbname' => 'exampleAdvanced',
        'username' => 'erasmomg',
        'password' => 'aldea*2017',
        'charset' => 'utf8mb4'
    ];

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                $dsn = "mysql:host=" . self::$config['host'] .
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
