<?php  // Responsável por disparar as outras chamadas // permite eu ão precisar usar include ou require.

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD']; // GET ou POST
$caminho = $_SERVER['PATH_INFO'] ?? '/';  // retorna "ola mundo" , tudo o que vem depois do "/" do "localhost"

#use Php\Primeiroprojeto\Router -- (Poderia ser)

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function(){
    return "Olá mundo!";
});

$r->get('/olapessoa', function(){
    return "Olá pessoa!";
});

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
});

$r->get('/ex0/formulario', function(){
    include("ex0.html");
});  // Sempre antes do handler

$r->post('/ex0/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";

});
#ex01
#Crie um algoritmo que receba um número digitado pelo usuário e verifique se esse valor é positivo,
#negativo ou igual a zero. A saída deve ser: "Valor Positivo", "Valor Negativo" ou "Igual a Zero".

$r->get('/ex01/formulario', function(){
    include("ex01.html");
});

$r->post('/ex01/resposta', function(){
    $numero = $_POST['numero'];
    if($numero >0){
        if($numero % 2 == 0){
            return "Você digitou  {$numero} . Este número é par.";
        }
        else{
            return "Você digitou {$numero} . Este número é ímpoar.";
        }    
    }
    else{
        return "Valor inválido opara esta verificação!";
    }
});

#ex02 
#Escreva um programa que leia 7 números diferentes, imprima o menor valor e imprima 
#a posição do menor valor na sequência de entrada.
$r->get('/ex02/formulario', function(){
        include ("ex02.html");
});
$r->post('/ex02/resposta', function(){
    $valor = $_POST['valor'];

    $menor = 999999;
    for($i = 0; $i < count($_POST['valor']); $i++){
        if($valor[$i] < $menor)
        $menor = $valor[$i];
        $posicao = $i;
    }
   
    echo "O menor valor digitado é: {$menor}. A Posição do menor valor digitado é: {$posicao} ";
  
});

#ex03 
#Escreva um programa para calcular a soma dos dois valores de entrada. 
#Se os dois valores forem iguais, retorne o triplo da soma.
$r->get('/ex03/formulario', function(){
    include ('ex03.html');
});
$r->post('/ex03/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    if($valor1 == $valor2){
        echo "Os valores são iguais.";
    }
    else{
        $soma = $valor1 + $valor2;
        echo "A soma dos valores é: {$soma}";
    }

});

#ex04 
#Crie um algoritmo que solicite a entrada de um número, e exiba a tabuada de 0 a 10 de acordo com
#o número solicitado, ex: Entrada = 4 Saída = 4 X 0 = 0...4 X 10 = 40.
$r->get('/ex04/formulario', function(){
    include ('ex04.html');
});
$r->post('/ex04/resposta', function(){
    $valor = isset($_POST['valor1']) ? $_POST['valor1'] : 0;
    echo "Valor recebido: $valor<br>"; 
    $tabuada = 0;

    while ($tabuada <= 10) {
        $resultado = $valor * $tabuada;
        echo "{$valor} x {$tabuada} = {$resultado}<br>";
        $tabuada++;
    };
   


});






#ROTAS

$resultado = $r->handler(); // verifica se existe a rota dentro das que eu cadastrei retorna a função que será executada

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();  // mata o processo
}

echo $resultado($r->getParams());  


