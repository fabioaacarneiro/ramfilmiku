<?php

use App\repository\BuscarTipos;

include_once "../../vendor/autoload.php";

header('Content-Type: application/json');

echo BuscarTipos::getTipos();
