<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CachorroDAO;
use Php\Primeiroprojeto\Models\Domain\Cachorro;

class CachorroController{

    public function inserir($params){
        require_once("../src/Views/cachorro/inserir_cachorro.html");
    }

    public function novo($params){
        $cachorro = new Cachorro(0, $_POST['nome'], $_POST['tutor']);
        $cachorroDAO = new CachorroDAO();
        if ($cachorroDAO->inserir($cachorro)){
            return "Cachorro Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
