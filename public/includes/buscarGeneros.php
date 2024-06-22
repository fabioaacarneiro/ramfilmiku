<?php

use App\repository\BuscarGeneros;

include_once "../../vendor/autoload.php";

header('Content-Type: application/json');

echo BuscarGeneros::getGeneros();
