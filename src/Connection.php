<?php

namespace Src;

use mysqli;

final class Connection
{

    static $conn = null;
    private static $credentials = null;

    private function __construct()
    {
        static::$credentials = (object) parse_ini_file("database.ini");

        static::$conn = new mysqli(
            static::$credentials->host,
            static::$credentials->user,
            static::$credentials->pass,
            static::$credentials->database
        );
    }

    private static function connect()
    {
        try {
            new Connection();
        } catch (\Exception $e) {
            var_dump("Houve um erro ao conectar com o bando de dados:\n>> {$e->getMessage()}");
            var_dump("Aviso: " . static::$conn->connect_error);
        }
    }

    static function getConnection()
    {
        if (is_null(static::$conn)) {
            static::connect();
            static::getConnection();
        }

        return static::$conn;
    }
}
