<?php

namespace App\repository;

use Src\Connection;

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
