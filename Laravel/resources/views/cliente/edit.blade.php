<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Alteração de Clientes</title>
</head>
    
    <h1>Fornulário de Alteração de Clientes</h1>
    <form action="{{route('clientes.update', $cliente->id)}}"method="POST">
    @CSRF  
    @method('PUT')
    <label for="nome">Novo nome do cliente</label>
    <input type="text" name="nome" id="nome" value="{{ $cliente->nome}}"><br>
    <label for="telefone">Novo telefone do cliente</label>
    <input type="text" name="telefone" id="telefone" value="{{ $cliente->telefone}}"><br>
    <label for="email">Novo email do cliente</label>
    <input type="text" name="email" id="email"value="{{ $cliente->email}}"><br>
    <button type="submit">Salvar</button>
</form>
</body>

</html>