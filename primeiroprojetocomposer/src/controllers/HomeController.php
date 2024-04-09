<?php

namespace Php\Primeiroprojeto\Controllers;  /* É o caminhjo que o auto load percorre, mas não o caminho das pastas. */



class HomeController{
    public function olaMundo(){
        return "Olá Mundo!";
    }
    public function formEx0(){          /* O servidor enxerga até pasta public */
        require_once("../src/Views/ex01.html");   /* Caminho para arquivos de visão, interfasces*/ 
    }
}