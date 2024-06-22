<?php

use App\repository\BuscarClassificacaoEtaria;

include_once "../../vendor/autoload.php";

header('Content-Type: application/json');

echo BuscarClassificacaoEtaria::getClassificacaoEtaria();
