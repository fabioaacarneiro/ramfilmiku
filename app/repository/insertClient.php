<?php

namespace App\repository;

use Src\Connection;

try {
    if (count($_POST) > 1) {

        $bodyRequest = (object) $_POST;

        $sql = "insert into clientes (nome, email, cidade, estado) values ( 
            '{$bodyRequest->nome}',
            '{$bodyRequest->email}',            
            '{$bodyRequest->cidade}',
            '{$bodyRequest->estado}');";

        $conn = Connection::getConnection();
        $conn->query($sql);
        header("Location: /pages/clientes.php");
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
