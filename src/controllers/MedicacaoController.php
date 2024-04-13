<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\MedicacaoDAO;
use Php\Primeiroprojeto\Models\Domain\Medicacao;

class MedicacaoController{

    public function inserir($params){
        require_once("../src/Views/medicacao/inserir_medicacao.html");
    }

    public function novo($params){
        $medicacao = new Medicacao(0, $_POST['nome'], $_POST['prescricao']);
        $medicacaoDAO = new MedicacaoDAO();
        if ($medicacaoDAO->inserir($medicacao)){
            return "Medicação Cadastrada com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
