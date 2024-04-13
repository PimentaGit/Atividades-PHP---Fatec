<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Medicacao{
    private $id_medicacao;
    private $nome;
    private $prescricao;
    public function __construct($id_medicacao, $nome, $prescricao){
        $this->setIdMedicacao ($id_medicacao);
        $this->setMedicacao($nome);
        $this->setPrescricao($prescricao);
    }
    public function getIdMedicacao(){
        return $this->id_medicacao;
}
public function setIdMedicacao($id_medicacao){
    $this->id_medicacao = $id_medicacao;
}
public function getMedicacao(){
    return $this->nome;
}
public function setMedicacao($nome){
     $this->nome = $nome;
}
public function get_Prescricao(){
    return $this->prescricao;
}
public function setPrescricao($prescricao){
    $this->prescricao = $prescricao;
}
}