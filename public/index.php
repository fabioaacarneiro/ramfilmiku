<?php

require_once "../vendor/autoload.php";

use Src\Connection;

try {
    $sql = "select * from clientes;";
    $conn = Connection::getConnection();
    $data = $conn->query($sql);

    try {
        while ($client = $data->fetch_object()) {
            echo "<p><b>ID: </b>{$client->id}<br>
                    <b>Nome: </b>{$client->nome}<br>
                    <b>Email: </b>{$client->email}<br>
                    <b>Cidade: </b>{$client->cidade}<br>
                    <b>Estado: </b>{$client->estado}<br>";
        }
    } catch (\Exception $e) {
        echo "<b>Sem dados de clientes...</b>";
    }
} catch (\Exception $e) {
    var_dump("Houve um erro ao conectar com o bando de dados:\n>> {$e->getMessage()}");
}
