<?php /*
namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Cachorro;

class CachorroDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Cachorro $cachorro){
        try{

            $sql= "INSERT INTO  cachorro (nome,tutor ) VALUES (:nome, :tutor)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cachorro->getNomeCao());
            $p->bindValue(":tutor",$cachorro->getTutor());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
} */

namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Cachorro;

class CahorroDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Cachorro $cachorro){
        try{

            $sql= "INSERT INTO  cachorro (nome,tutor ) VALUES (:nome, :tutor)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cachorro->getNomeCao());
            $p->bindValue(":tutor",$cachorro->getTutor());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
    
    public function alterar(Cachorro $cachorro){
        try{
            $sql = "UPDATE cachorro SET nome = :nome tutor = :tutor
                WHERE id = :id";
                 $p= $this->conexao->getConexao()->prepare($sql);
                 $p->bindValue(":nome", $cachorro-> getNomeCao());
                 $p->bindvalue(":tutor", $cachorro->getTutor());
                 return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }
    public function excluir($id){
        try{
            $sql = " DELETE FROM cachorro WHERE id = :id";
            $p= $this->conexao->getConexao()->prepare($sql);
                $p->bindValue(":id", $id);
                return $p->execute();
        }catch(\Exception $e){
            return 0;
    }
}
    public function consultarTodos(){
        try{
            $sql= "SELECT * FROM cachorro";
            return $this->conexao->getConexao()->query($sql);
        }catch(\Exception $e){
            return 0;
        }
    }
    public function consultar($id){
        try{
            $sql = "SELECT * FROM cachorro WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();       
        }catch(\Exception $e){
            return 0;
        }
    }       
}