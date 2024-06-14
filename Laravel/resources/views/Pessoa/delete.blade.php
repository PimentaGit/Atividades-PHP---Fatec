<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Exclusão de Pessoas</title>
</head>
    
    <h1>Fornulário de Exclusão de Pessoas</h1>
    
    <form action="{{route('pessoa.destroy', $pessoa->id)}}"method="POST">
    @CSRF  
    @method('DELETE')
    <label for="nome">Nome da pessoa</label>
    <input type="text" name="nome" id="nome" disabled value="{{ $pessoa->nome}}"><br>
    <label for="telefone">Telefone da pessoa</label>
    <input type="text" name="telefone" id="telefone" disabled value="{{ $pessoa->telefone}}"><br>
    <button type="submit">Excluir</button>
</form>
</body>

</html>