<?php  // Responsável por disparar as outras chamadas // permite eu ão precisar usar include ou require.

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD']; // GET ou POST
$caminho = $_SERVER['PATH_INFO'] ?? '/';  // retorna "ola mundo" , tudo o que vem depois do "/" do "localhost"

#use Php\Primeiroprojeto\Router -- (Poderia ser)

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', 'Php\Primeiroprojeto\Controllers\HomeController@olaMundo'); /* Namespace ...Até o @, é o csaminho, depois, o método.*/ 


$r->get('/olapessoa', function($params){
return 'Olá'. $params[1];
});
$r->get('ex0/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formEx0');


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
    require_once ('ex04.html');
});
$r->post('/ex04/resposta', function(){
    $valor1 = $_POST['valor1'];
    $resposta ="";
    for($i=1; $i<=10;$i++){
        $resposta .= "$valor1 x $i = ".($valor1 * $i). "<br/>";
    }
   return $resposta;
});


// chamando o formulário para inserir categoria ***************************************************************************************************************************
$r->get('/categoria/inserir', 'Php\Primeiroprojeto\Controllers\CategoriaController@inserir'); // Nome até a classe de controle .Depois do arroba, método

$r->post('/categoria/novo', 'Php\Primeiroprojeto\Controllers\CategoriaController@novo');

#ex05
#Crie um algoritmo que solicite um número, faça o cálculo fatorial e exiba o resultado na tela.
#Ex: Entrada = 3
#Processamento: (3 * 2) * 1
#Saída: 6
$r->get('/ex05/formulario', function(){
    require_once ('ex05.html');
});
$r->post('/ex05/resposta', function (){
   
        $num = $_POST['num'];
        if ($num < 0) {
            echo "Não é possível calcular o fatorial de um número negativo.";
        } else {
            $fatorial = 1;
            for ($i = 2; $i <= $num; $i++) {
                $fatorial *= $i;
            }
            echo "O fatorial de $num é: $fatorial";
        }
});

#ex06 
#Faça um algoritmo PHP que receba os valores A e B, imprima-os em ordem crescente em relação aos
#seus valores. Caso os valores sejam iguais, informar o usuário e imprimir o valor em tela apenas uma vez.
#Exemplo, para A=5, B=4 você deve imprimir na tela: "4 5".
 #para A=5, B=5 você deve imprimir na tela: “Números iguais: 5”.
$r->get('/ex06/formulario', function(){
    require_once ('ex06.html');
});

$r->post('/ex06/resposta', function () {
    $a = $_POST['a'];
    $b = $_POST['b'];
     if ($a < $b) {
         echo "$a $b";
     } elseif ($a > $b) {
         echo "$b $a";
     } else {
         echo "Números iguais: $a";
     }
 });
#ex07
#Faça um programa em PHP no qual leia um valor em metros e o converta em centímetros.
$r->get('/ex07/formulario', function(){
    require_once ('ex07.html');
});
$r->post('/ex07/resposta', function(){
    $metros = $_POST['metros'];
    if ($metros > 0){
        $centimetros = $metros * 100;
        echo "$metros metro(s)  em centimetros é:  $centimetros cm";
    }
});
#ex08
#Faça um programa em PHP para uma loja de tintas. O programa deverá pedir o tamanho em metros
#quadrados da área a ser pintada. Considere que a cobertura da tinta é de 1 litro para cada 3 metros
#quadrados e que a tinta é vendida em latas de 18 litros, que custam R$ 80,00. Informe ao usuário a
#quantidades de latas de tinta a serem compradas e o preço total.
$r->get('/ex08/formulario', function(){
    require_once ('ex08.html');
});
$r->post('/ex08/resposta', function(){
    $m2 = $_POST['m2'];
    if ($m2 > 0){
        $totallitros = $m2 / 3;
        $lata = ceil($totallitros / 18);
        $valor = $lata * 80;
        echo "Quantidade de latas de tinta a serem compradas: $lata.  Preço total: R$ $valor.";
    }
});
#ex09
#Faça um script PHP que receba de um formulário HTML5 uma variável com o ano de nascimento de
#uma pessoa, crie uma constante com o ano atual, calcule e mostre:
#a. a idade dessa pessoa em anos;
#b. quantos dias esta pessoa já viveu;
#c. quantos anos essa pessoa terá em 2025
$r->get('/ex09/formulario', function(){
    require_once ('ex09.html');
});
$r->post('/ex09/resposta', function(){
    $ano = $_POST['ano'];
    if ($ano > 0){
        $idade_em_anos = 2024 - $ano;
        $dias = $idade_em_anos * 365;
        $prox_ano = $idade_em_anos  + 1;
        
        echo "Idade dessa pessoa em anos: $idade_em_anos; <br>
        Dias que esta pessoa já viveu: $dias; <br>
        Anos queessa pessoa terá em 2025: $prox_ano";
    }
});
#ex10
#Crie uma página em HTML5 na qual a pessoa possa digitar seu peso e sua altura e um programa PHP
#para o cálculo do IMC da pessoa. Defina se a pessoa está acima ou abaixo do peso. Procure referências
#sobre este índice (o que é considerado normal, abaixo ou acima do peso). Inclua a referência (página
#de acesso) para que a pessoa leia sobre este assunto.
$r->get('/ex10/formulario', function(){
    require_once ('ex10.html');
});
$r->post('/ex10/resposta', function(){
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    if ($altura > 0 && $peso > 0) {
        $imc = $peso / (($altura / 100) * ($altura / 100));
        echo "Seu IMC:  $imc";

        if ($imc < 18.5) {
            echo "<br>Você está abaixo do peso.";
        } elseif ($imc >= 18.5 && $imc < 25) {
            echo "<br>Você está com peso normal.";
        } elseif ($imc >= 25 && $imc < 30) {
            echo "<br>Você está com sobrepeso.";
        } else {
            echo "<br>Você está obeso.";
        }
    }
});



#ROTAS.....................................

$resultado = $r->handler(); // verifica se existe a rota dentro das que eu cadastrei retorna a função que será executada

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();  // mata o processo
}

if($resultado instanceof Closure){ /* Passando para uma variável a função */
    echo $resultado($r->getParams());  
}

elseif(is_string ($resultado) ){  /*  */ 
    $resultado = explode("@", $resultado); /*  */
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}


