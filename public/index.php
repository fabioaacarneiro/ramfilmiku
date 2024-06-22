<?php


try {
    $connection = new mysqli("localhost", "root", "", "phpmysqli");
} catch (\Exception $e) {
    var_dump("Houve um erro ao conectar com o bando de dados:\n>> {$e->getMessage()}");
    var_dump("Aviso: {$connection->connect_error}");
}


try {
    $sql = "select * from clientes;";
    $data = $connection->query($sql);

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
