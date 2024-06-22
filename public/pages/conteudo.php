<?php

use App\repository\BuscarConteudos;

include_once "../../vendor/autoload.php";
include_once "../../app/resources/partials/header.php";
include_once "../../app/resources/partials/navbar.php";

$conteudos = BuscarConteudos::getConteudo();

?>

<div class="conteudos">
    <?php if ($conteudos) {
        foreach ($conteudos as $conteudo) { ?>
            <section class="conteudo">
                <ul>
                    <h3 class="conteudo-titulo"><?php echo $conteudo->titulo ?></h3>
                    <p class="usuario-nome"><b>Autor: </b><em><?php echo $conteudo->usuario_nome ?></em></p>
                    <li><img class="conteudo-capa" src="<?php echo $conteudo->capa ?>" alt="<?php echo $conteudo->titulo ?>"></li>
                    <li><b>Descrição: </b><?php echo $conteudo->descricao ?></li>
                    <li><b>Lançamento: </b><?php echo $conteudo->data_lancamento ?>.</li>
                    <li><b>Duração: </b><?php echo $conteudo->duracao_minutos ?> minutos.</li>
                    <li><b>Classificação etária: </b><?php echo $conteudo->classificacao_etaria_descricao ?>.</li>
                    <li><b>Diretor: </b><?php echo $conteudo->diretor ?>.</li>
                    <li><b>Elenco: </b><?php echo $conteudo->elenco ?>.</li>
                    <li><b>Origem: </b><?php echo $conteudo->pais_nome ?>.</li>
                    <li><b>Curtidas: </b><?php echo $conteudo->curtidas ?></li>
                </ul>
                <hr class="separador-conteudo">
            </section>
        <?php } ?>
    <?php } ?>
</div>

<?php include_once "../../app/resources/partials/footer.php";
