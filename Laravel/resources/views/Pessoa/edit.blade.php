<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Alteração de Pessoas</title>
    
</head>
    
    <h1>Fornulário de Alteração de Pessoas</h1>
    

    <form action="{{route('pessoa.update', $pessoa->id)}}"method="POST">
    @CSRF  
    @method('PUT')
    <label for="nome">Novo nome da pessoa</label>
    <input type="text" name="nome" id="nome" value="{{ $pessoa->nome }}"><br>
    <label for="telefone">Novo telefone do pessoa</label>
    <input type="text" name="telefone" id="telefone" value="{{ $pessoa->telefone }}"><br>
    <button type="submit">Salvar</button>
</form>
</body>

</html>