<?php
namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Medicacao;

class MedicacaoDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Medicacao $medicacao){
        try{

            $sql= "INSERT INTO  medicacao (nome,prescricao ) VALUES (:nome, :prescricao)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $medicacao->getMedicacao());
            $p->bindValue(":prescricao",$medicacao->get_Prescricao());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
}