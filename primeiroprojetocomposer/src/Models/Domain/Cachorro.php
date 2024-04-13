<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Cachorro{
    private $id_cachorro;
    private $nome;
    private $tutor;
    public function __construct($id_cachorro, $nome, $tutor){
        $this->setIdCachorro ($id_cachorro);
        $this->setNomeCao ($nome);
        $this->setTutor ($tutor);
    }
    public function getIdCachorro(){
        return $this->id_cachorro;
}
public function setIdCachorro($id_cachorro){
    $this->id_cachorro = $id_cachorro;
}
public function getNomeCao(){
    return $this->nome;
}
public function setNomeCao($nome){
     $this->nome = $nome;
}
public function getTutor(){
    return $this->tutor;
}
public function setTutor($tutor){
    $this->tutor = $tutor;
}
}