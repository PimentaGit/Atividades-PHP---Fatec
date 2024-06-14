<?php
/*
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

}*/

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ExameDAO;
use Php\Primeiroprojeto\Models\Domain\Exame;

class ExameController{

    public function index($params){                                                         // 26/04/2024
        $cexameDAO = new ExameDAO();
        $resultado = $exameDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Exame inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!"; 
        elseif($acao == "alterar" && $status == "true")
            $mensagem = "Exame alterado com sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!"; 
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Exame excluído com sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!"; 
        else 
            $mensagem = "";
        require_once("../src/Views/exame/exame.php");
    }
    public function inserir($params){
        require_once("../src/Views/exame/inserir_exame.html");
    }

    public function novo($params){
        $exame = new Exame(0, $_POST['descricao']);
        $exameDAO = new ExameDAO();
        if ($exameDAO->inserir($exame)){
            header("location: /exame/inserir/true");
        } else {
            header("location: /exame/inserir/false");
        }
    }
    public function alterar($params){
        $exameDAO = new ExameDAO();
        $resultado = $exameDAO->consultar($params[1]);
        require_once("../src/Views/exame/alterar_exame.php");
    }
    public function excluir($params){
        $exameDAO = new ExameDAO();
        $resultado = $exameDAO->consultar($params[1]);
        require_once("../src/Views/exame/excluir_exame.php");
    }
    public function editar($params){
        $exame = new Exame($_POST['id'], $_POST['descricao']);
        $exameDAO = new ExameDAO();
        if($exameDAO->alterar($exame)){
            header("location: /exame/alterar/true");
        } else {
            header("location: /exame/alterar/false");
        }
        }
        public function deletar($params){
            $exameDAO = new ExameDAO;
            if($exameDAO->excluir($_POST['id'])){
                header("location: /exame/excluir/true");
            }else {
                header("location: /exame/excluir/false");
                }
            }

        }
    
    



