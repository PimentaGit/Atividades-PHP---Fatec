<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\PessoaDAO;
use Php\Primeiroprojeto\Models\Domain\Pessoa;

class PessoaController{
    public function index($params){                                                        
        $pessoa = new PessoaDAO();
        $resultado = $pessoa->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Pessoa inserida com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!"; 
            elseif($acao == "alterar" && $status == "true")
            $mensagem = "Pessoa alterada com sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!"; 
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Pessoa excluída com sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!"; 
        else 
            $mensagem = "";
        require_once("../src/Views/pessoa/pessoa.php");
    }


    public function inserir($params){
        require_once("../src/Views/pessoa/inserir_pessoa.html");
    }

  
    public function novo($params){
        $pessoa = new Pessoa(0, $_POST['nome'], $_POST['telefone']);
        $pessoaDAO = new PessoaDAO();
        if ($pessoaDAO->inserir($pessoa)){
            header("location:/pessoa/inserir/true");
        } else {
            header("location:/pessoa/inserir/false");
        }
    }


    public function alterar($params){
        $pessoaDAO = new PessoaDAO();
        $resultado = $pessoaDAO->consultar($params[1]);
        require_once("../src/Views/pessoa/pessoa_alterar.php");
    }
    public function excluir($params){
        $pessoaDAO = new PessoaDAO();
        $resultado = $pessoaDAO->consultar($params[1]);
        require_once("../src/Views/pessoa/pessoa_excluir.php");
    }
    public function editar($params){
        $pessoa = new Pessoa(0, $_POST['nome'], $_POST['telefone']);
        $pessoaDAO = new PessoaDAO();
        if($pessoaDAO->alterar($pessoa)){
            header("location: /pessoa/alterar/true");
        } else {
            header("location: /pessoa/alterar/false");
        }
        }
        public function deletar($params){
            $pessoaDAO = new pessoaDAO;
            if($pessoaDAO->excluir($_POST['id'])){
                header("location: /pessoa/excluir/true");
            }else {
                header("location: /pessoa/excluir/false");
                }
            }



}
