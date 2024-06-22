<?php
include_once "../../vendor/autoload.php";
include_once "../../app/resources/partials/header.php";
include_once "../../app/resources/partials/navbar.php";

$cadastrarConteudo = include_once "../../app/repository/cadastrarConteudo.php";
$buscarGeneros = include_once "../../app/repository/buscarGeneros.php";

?>

<div class="form-insert-client">
    <form action="<?php $cadastrarConteudo ?>" method="post">

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="capa">Link da Capa:</label>
        <input type="text" id="capa" name="capa" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" cols="50" required></textarea>

        <label for="data_lancamento">Data de Lançamento:</label>
        <input type="date" id="data_lancamento" name="data_lancamento" required>

        <label for="duracao_minutos">Duração (minutos):</label>
        <input type="number" id="duracao_minutos" name="duracao_minutos" required>

        <label for="classificacao_etaria">Classificação Etária:</label>
        <select id="classificacao_etaria" name="classificacao_etaria" required>
        </select>

        <label for="diretor">Diretor:</label>
        <input type="text" id="diretor" name="diretor" required>

        <label for="elenco">Elenco:</label>
        <textarea id="elenco" name="elenco" rows="4" cols="50" required></textarea>

        <label for="pais">País de Origem:</label>
        <select id="pais" name="pais" required>
        </select>

        <label for="generos">Gêneros:</label>
        <select id="generos" name="generos[]" multiple size="5" required>
        </select>

        <label for="tipos">Tipos:</label>
        <select id="tipos" name="tipos[]" multiple size="5" required>
        </select>
        <button type="submit">Cadastrar</button>
    </form>
</div>


<?php include_once "../../app/resources/partials/footer.php"; ?>
<script module src="<?php asset("js/jquery/generateOptions.js") ?>"></script>