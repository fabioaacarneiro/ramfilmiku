<?php
include_once "../../vendor/autoload.php";
include_once "../../app/resources/partials/header.php";
include_once "../../app/resources/partials/navbar.php";
?>

<table class="table-clients">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Cidade</th>
            <th>UF</th>
        </tr>
    </thead>
    <tbody>
        <?php
        try {
            $sql = "select * from clientes;";
            $conn = \Src\Connection::getConnection();
            $data = $conn->query($sql);

            try {
                while ($client = $data->fetch_object()) {
                    echo "<tr>
                            <td>{$client->id}</td>
                            <td>{$client->nome}</td>
                            <td>{$client->email}</td>
                            <td>{$client->cidade}</td>
                            <td>{$client->estado}</td>
                        </tr>";
                }
            } catch (\Exception $e) {
                echo "<b>Sem dados de clientes...</b>";
            }
        } catch (\Exception $e) {
            var_dump("Houve um erro ao conectar com o bando de dados:\n>> {$e->getMessage()}");
        }
        ?>
    </tbody>
</table>