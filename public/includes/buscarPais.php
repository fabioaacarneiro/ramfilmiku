<?php

use App\repository\BuscarPais;

include_once "../../vendor/autoload.php";

header('Content-Type: application/json');

echo BuscarPais::getPais();
