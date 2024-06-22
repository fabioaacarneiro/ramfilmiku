<?php

namespace App\repository;

use Src\Connection;


final class BuscarGeneros
{
    private function __construct()
    {
    }

    static function getGeneros()
    {
        $conn = Connection::getConnection();
        $result = $conn->query("select id,nome from generos;");
        $generos = [];
        while ($row = $result->fetch_assoc()) {
            $generos[] = $row;
        }
        $conn->close();
        return json_encode($generos);
    }
}
