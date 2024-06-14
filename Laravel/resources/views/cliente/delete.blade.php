<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Exclusão de Clientes</title>
</head>
    
    <h1>Fornulário de Exclusão de Clientes</h1>
    <form action="{{route('clientes.destroy', $cliente->id)}}"method="POST">
    @CSRF  
    @method('DELETE')
    <label for="nome">Novo nome do cliente</label>
    <input type="text" name="nome" id="nome" disabled value="{{ $cliente->nome}}"><br>
    <label for="telefone">Novo telefone do cliente</label>
    <input type="text" name="telefone" id="telefone" disabled value="{{ $cliente->telefone}}"><br>
    <label for="email">Novo email do cliente</label>
    <input type="text" name="email" id="email" disabled value="{{ $cliente->email}}"><br>
    <button type="submit">Excluir</button>
</form>
</body>

</html>