<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Inserção de Pessoas</title>
</head>
    
    <h1>Fornulário de Inserção de Pessoas</h1>
    
    <form action="{{route('pessoa.store')}}" method="POST">
    @CSRF  
    <label for="nome">Informe o nome da pessoa</label>
    <input type="text" name="nome" id="nome"><br>
    <label for="telefone">Informe o telefone da pessoa</label>
    <input type="text" name="telefone" id="telefone"><br>
  
    <button type="submit">Salvar</button>
</form>
</body>

</html>