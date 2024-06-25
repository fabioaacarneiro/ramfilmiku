<?php

namespace App\repositories;

use Src\Connection;


class OptionsDataRepository
{

    function getOptions(string $name): array
    {
        $generos = [];
        $conn = Connection::getConnection();

        $sql = ($name === 'classificacao_etaria') ? "select codigo,descricao from classificacao_etaria;" : "select id,nome from $name;";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $generos[] = $row;
        }

        $conn->close();

        return $generos;
    }
}
