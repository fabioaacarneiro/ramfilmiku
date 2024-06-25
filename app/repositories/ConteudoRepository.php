<?php

namespace App\repositories;

use Src\Connection;

class ConteudoRepository
{

    function getConteudo(): array
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

    static function storeConteudo()
    {
        try {
            $usuarioId = 1;

            if (count($_POST) !== 0) {

                $post = (object) $_POST;

                $sql = "insert into conteudos (
                    titulo, 
                    descricao, 
                    data_lancamento, 
                    duracao_minutos, 
                    classificacao_etaria, 
                    diretor, 
                    elenco, 
                    usuario_id, 
                    pais_id
                ) values (
                    ?, 
                    ?, 
                    ?, 
                    ?, 
                    ?, 
                    ?, 
                    ?, 
                    ?, 
                    ?
                );";

                $conn = Connection::getConnection();
                $stmt = $conn->prepare($sql);
                $stmt->bind_param(
                    "sssisssii",
                    $post->titulo,
                    $post->descricao,
                    $post->data_lancamento,
                    $post->duracao_minutos,
                    $post->classificacao_etaria,
                    $post->diretor,
                    $post->elenco,
                    $usuarioId,
                    $post->pais
                );

                if ($stmt->execute()) {
                    $conteudoId = $stmt->insert_id;

                    $sqlGenero = "insert into conteudos_generos (
                conteudo_id,
                genero_id
            ) values (
                ?,
                ?
            );";

                    $stmtGenero = $conn->prepare($sqlGenero);

                    foreach ($post->generos as $generoId) {
                        $stmtGenero->bind_param("ii", $conteudoId, $generoId);
                        $stmtGenero->execute();
                    }

                    $stmtGenero->close();

                    $sqlTipo = "insert into conteudos_tipos (
                conteudo_id,
                tipo_id
            ) values (
                ?,
                ?
            );";

                    $stmtTipo = $conn->prepare($sqlTipo);

                    foreach ($post->tipos as $tipoId) {
                        $stmtTipo->bind_param("ii", $conteudoId, $tipoId);
                        $stmtTipo->execute();
                    }

                    $stmtTipo->close();

                    $sqlCapa = "insert into imagens (
                link,
                conteudo_id
            ) values (
                ?,
                ?
            );";

                    $stmtCapa = $conn->prepare($sqlCapa);
                    $stmtCapa->bind_param("si", $post->capa, $conteudoId);
                    $stmtCapa->execute();
                    $stmtCapa->close();
                }

                header("Location: /pages/conteudo.php");
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
