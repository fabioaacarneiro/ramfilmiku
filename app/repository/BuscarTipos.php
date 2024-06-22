<?php

namespace App\repository;

use Src\Connection;


final class BuscarTipos
{
    private function __construct()
    {
    }

    static function getTipos()
    {
        $conn = Connection::getConnection();
        $result = $conn->query("select id,nome from tipos;");
        $tipos = [];
        while ($row = $result->fetch_assoc()) {
            $tipos[] = $row;
        }
        $conn->close();
        return json_encode($tipos);
    }
}
