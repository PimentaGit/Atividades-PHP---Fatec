<?php
namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Categoria;

class CategoriaDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Categoria $categoria){
        try{

            $sql= "INSERT INTO  categoria (descricao) VALUES (:descricao)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $categoria->getDescricao());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
    public function alterar(Categoria $categoria){
        try{
            $sql = "UPDATE categoria SET descricao = :descricao
                WHERE id = :id";
                 $p= $this->conexao->getConexao()->prepare($sql);
                 $p->bindValue(":descricao", $categoria->getDescricao());
                 $p->bindvalue(":id", $categoria->getId());
                 return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }
    public function excluir($id){
        try{
            $sql = " DELETE FROM categoria WHERE id = :id";
            $p= $this->conexao->getConexao()->prepare($sql);
                $p->bindValue(":id", $id);
                return $p->execute();
        }catch(\Exception $e){
            return 0;
    }
}
    public function consultarTodos(){
        try{
            $sql= "SELECT * FROM categoria";
            return $this->conexao->getConexao()->query($sql);
        }catch(\Exception $e){
            return 0;
        }
    }
    public function consultar($id){
        try{
            $sql = "SELECT * FROM categoria WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();       // retorna o específico (fetch all se fossem vários)
        }catch(\Exception $e){
            return 0;
        }
    }        // funções ligadas ao Banco de Dados. 
}               // Caso haja uma função diferente de tudo, pode ser criada uma nova classe para colocar a função.

