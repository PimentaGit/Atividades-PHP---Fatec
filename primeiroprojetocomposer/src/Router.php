<?php

namespace Php\Primeiroprojeto;

class Router
{
    private $routes = [];
    private $method;
    private $path;
    private $params;

    public function __construct($method, $path)
    {
        $this->method = $method;
        $this->path = $path;
    }

    public function get(string $route, $action)  // criando a rota 
    {
        $this->add('GET', $route, $action); // rota / ação
    }

    public function post(string $route, $action) // cria padrão que au ndo chamo POST, algo acontece...
    {
        $this->add('POST', $route, $action);
    }

    private function add(string $method, string $route, $action){
        $this->routes[$method][$route] = $action;  // mapeado por um método e mapeado por uma rota O array tem várias rotas armazenadas
    }

    public function getParams()  // Passagem de parâmetros nas rotas. 
    {
        return $this->params;
    }

    public function handler()  // Pega as funcções que estão nas rotas e faz executar.
    {
        if (empty($this->routes[$this->method])){
            return false;
        }

        if (isset($this->routes[$this->method][$this->path])){
            return $this->routes[$this->method][$this->path];
        }

        foreach($this->routes[$this->method] as $route => $action){
            $result = $this->checkUrl($route, $this->path);
            if ($result >= 1){
                return $action;
            }
        }
    }

    private function checkUrl(string $route, $path)  // Faz recuperar parametros que estiver passando em uma url
    {

        preg_match_all('/\{([^\}]*)\}/', $route, $variables);

        $regex = str_replace('/', '\/', $route);

        foreach ($variables[0] as $k => $variable) {
            $replacement = '([a-zA-Z0-9\-\_\ ]+)';
            $regex = str_replace($variable, $replacement, $regex);
        }

        $regex = preg_replace('/{([a-zA-Z]+)}/', '([a-zA-Z0-9+])', $regex);
        $result = preg_match('/^' . $regex . '$/', $path, $params);
        $this->params = $params;

        return $result;
    }
}