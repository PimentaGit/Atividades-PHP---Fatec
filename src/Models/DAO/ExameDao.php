<?php
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
}