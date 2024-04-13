<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Pessoa{
    private $id_pessoa;
    private $nome;
    private $telefone;
    public function __construct($id_pessoa, $nome, $telefone){
        $this->setIdPessoa ($id_pessoa);
        $this->setNome ($nome);
        $this->setTelefone ($telefone);
    }
    public function getIdPessoa(){
        return $this->id_pessoa;
}
public function setIdPessoa($id){
    $this->id_pessoa = $id;
}
public function getNome(){
    return $this->nome;
}
public function setNome($nome){
     $this->nome = $nome;
}
public function getTelefone(){
    return $this->telefone;
}
public function setTelefone($telefone){
    $this->telefone = $telefone;
}
}