<?php
namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Pessoa;

class PessoaDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Pessoa $pessoa){
        try{

            $sql= "INSERT INTO  pessoa (nome,telefone ) VALUES (:nome, :telefone)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $pessoa->getNome());
            $p->bindValue(":telefone",$pessoa->getTelefone());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
}