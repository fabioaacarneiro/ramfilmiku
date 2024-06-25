<?php

namespace App\controllers;

use App\repositories\OptionsDataRepository;

final class OptionsData
{
    private static $respository = null;

    private function __construct()
    {
        if (is_null(self::$respository)) {
            self::$respository = new OptionsDataRepository();
        }
    }

    static function findOptionsByName(string $name)
    {
        header('Content-Type: application/json');

        new OptionsData();

        if (!in_array(strtolower($name), ['tipos', 'pais',  'generos', 'classificacao_etaria'])) {
            return json_encode([
                "error" => "tabela não encontrada no banco de dados",
            ]);
        } else {
            $options = self::$respository->getOptions($name);
            self::$respository = null;
            return json_encode($options);
        }
    }
}
