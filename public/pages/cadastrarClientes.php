<?php
include_once "../../vendor/autoload.php";
include_once "../../app/resources/partials/header.php";
include_once "../../app/resources/partials/navbar.php";
$insertClient = include_once "../../app/repository/insertClient.php";

?>

<div class="form-insert-client">
    <form action="<?php $insertClient ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" placeholder="informe o nome">
        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="informe o email">
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" placeholder="informe a cidade">
        <label for="estado">Estado(Siglas ex: SP):</label>
        <input type="text" name="estado" placeholder="SP" maxlength="2">
        <button type="submit">Cadastrar</button>
    </form>
</div>