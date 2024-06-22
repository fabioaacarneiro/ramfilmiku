<?php

namespace App\repository;

use Src\Connection;

final class BuscarConteudos
{

    private function __construct()
    {
    }

    static function getConteudo(): array
    {
        $usuarioId = 1;

        try {
            $sql = "select * from conteudos;";
            $conn = Connection::getConnection();
            $result = $conn->query($sql);

            $conteudos = [];

            try {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        try {
                            $sqlCapa = "select link from imagens where conteudo_id = {$row["id"]};";
                            $resultCapa = $conn->query($sqlCapa);
                            $row['capa'] = $resultCapa->fetch_assoc()["link"];

                            $sqlUsuarioNome = "select nome from usuarios where id = {$usuarioId};";
                            $resultUsuarioNome = $conn->query($sqlUsuarioNome);
                            $row['usuario_nome'] = $resultUsuarioNome->fetch_assoc()["nome"];

                            $sqlPais = "select nome from pais where id = {$row['pais_id']};";
                            $resultPais = $conn->query($sqlPais);
                            $row['pais_nome'] = $resultPais->fetch_assoc()["nome"];

                            $sqlClassificacaoEtaria = "select descricao from classificacao_etaria where codigo = '{$row['classificacao_etaria']}';";
                            $resultClassificacaoEtaria = $conn->query($sqlClassificacaoEtaria);
                            $row['classificacao_etaria_descricao'] = $resultClassificacaoEtaria->fetch_assoc()["descricao"];

                            $conteudos[] = (object) $row;
                        } catch (\Exception $e) {
                            var_dump($e->getMessage());
                        }
                    }
                }
            } catch (\Exception $e) {
                $conteudos[] = "sem conteúdo para mostrar";
            }
        } catch (\Exception $e) {
            var_dump("Houve um erro ao conectar com o bando de dados:\n>> {$e->getMessage()}");
        }
        return $conteudos;
    }
}
