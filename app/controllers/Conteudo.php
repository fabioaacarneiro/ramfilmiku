<?php

namespace App\controllers;

use App\repositories\ConteudoRepository;

final class Conteudo
{
    private static $repository = null;

    private function __construct()
    {
        if (is_null(self::$repository)) {
            self::$repository = new ConteudoRepository();
        }
    }

    static function findAllConteudo()
    {
        new Conteudo();
        $conteudo = self::$repository->getConteudo();
        self::$repository = null;
        return $conteudo;
    }
}
