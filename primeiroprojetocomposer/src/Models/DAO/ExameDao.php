<?php
/*
namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Exame;

class ExameDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Exame $exame){
        try{

            $sql= "INSERT INTO  exame (nome,descricao ) VALUES (:nome, :descricao)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $exame->getNomeExame());
            $p->bindValue(":descricao",$exame->getExame());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
}*/

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Exame;

class ExameDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Exame $exame){
        try{

            $sql= "INSERT INTO  exame (nome) VALUES (:nome)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $exame->getNome());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
    public function alterar(Exame $exame){
        try{
            $sql = "UPDATE exame SET nome = :nome
                WHERE id = :id";
                 $p= $this->conexao->getConexao()->prepare($sql);
                 $p->bindValue(":nome", $exame->getNome());
                 $p->bindvalue(":id", $exame->getId());
                 return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }
    public function excluir($id){
        try{
            $sql = " DELETE FROM exame WHERE id = :id";
            $p= $this->conexao->getConexao()->prepare($sql);
                $p->bindValue(":id", $id);
                return $p->execute();
        }catch(\Exception $e){
            return 0;
    }
}
    public function consultarTodos(){
        try{
            $sql= "SELECT * FROM exame";
            return $this->conexao->getConexao()->query($sql);
        }catch(\Exception $e){
            return 0;
        }
    }
    public function consultar($id){
        try{
            $sql = "SELECT * FROM exame WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();       // retorna o específico (fetch all se fossem vários)
        }catch(\Exception $e){
            return 0;
        }
    }        // funções ligadas ao Banco de Dados. 
}               // Caso haja uma função diferente de tudo, pode ser criada uma nova classe para colocar a função.

