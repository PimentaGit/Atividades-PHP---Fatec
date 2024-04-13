<?php
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
}