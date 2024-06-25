<?php

use App\controllers\OptionsData;

include_once "../../vendor/autoload.php";

echo OptionsData::findOptionsByName($_GET["option"]);
