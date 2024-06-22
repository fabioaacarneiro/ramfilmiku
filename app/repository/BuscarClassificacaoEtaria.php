<?php

namespace App\repository;

use Src\Connection;


final class BuscarClassificacaoEtaria
{
    private function __construct()
    {
    }

    static function getClassificacaoEtaria()
    {
        $conn = Connection::getConnection();
        $result = $conn->query("select codigo,descricao from classificacao_etaria;");
        $classificacaoEtaria = [];
        while ($row = $result->fetch_assoc()) {
            $classificacaoEtaria[] = $row;
        }
        $conn->close();
        return json_encode($classificacaoEtaria);
    }
}
