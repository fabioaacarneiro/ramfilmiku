<?php

namespace App\repository;

use Src\Connection;


final class BuscarPais
{
    private function __construct()
    {
    }

    static function getPais()
    {
        $conn = Connection::getConnection();
        $result = $conn->query("select id,nome from pais;");
        $generos = [];
        while ($row = $result->fetch_assoc()) {
            $generos[] = $row;
        }
        $conn->close();
        return json_encode($generos);
    }
}
