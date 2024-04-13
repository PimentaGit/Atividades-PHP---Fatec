<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ExameDAO;
use Php\Primeiroprojeto\Models\Domain\Exame;

class ExameController{

    public function inserir($params){
        require_once("../src/Views/exame/inserir_exame.html");
    }

    public function novo($params){
        $exame = new Exame(0, $_POST['nome'], $_POST['descricao']);
        $exameDAO = new ExameDAO();
        if ($exameDAO->inserir($exame)){
            return "Exame Cadastrado com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
