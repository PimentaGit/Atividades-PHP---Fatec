<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Exame{
    private $id_exame;
    private $nome;
    private $exame;
    public function __construct($id_exame, $nome, $exame){
        $this->setIdExame ($id_exame);
        $this->setNomeExame ($nome);
        $this->setExame ($exame);
    }
    public function getIdExame(){
        return $this->id_exame;
}
public function setIdExame($id_exame){
    $this->id_exame = $id_exame;
}
public function getNomeExame(){
    return $this->nome;
}
public function setNomeExame($nome){
     $this->nome = $nome;
}
public function getExame(){
    return $this->exame;
}
public function setExame($exame){
    $this->exame = $exame;
}
}