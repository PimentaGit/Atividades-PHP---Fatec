<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Alteração de Pessoas</title>
    
</head>
    
    <h1>Fornulário de Alteração de Pessoas</h1>
    

    <form action="<?php echo e(route('pessoa.update', $pessoa->id)); ?>"method="POST">
    <?php echo csrf_field(); ?>  
    <?php echo method_field('PUT'); ?>
    <label for="nome">Novo nome da pessoa</label>
    <input type="text" name="nome" id="nome" value="<?php echo e($pessoa->nome); ?>"><br>
    <label for="telefone">Novo telefone do pessoa</label>
    <input type="text" name="telefone" id="telefone" value="<?php echo e($pessoa->telefone); ?>"><br>
    <button type="submit">Salvar</button>
</form>
</body>

</html><?php /**PATH C:\Users\di-pi\OneDrive - Fatec Centro Paula Souza\5_quinto_semestre\Programação Web\projeto-crud\projeto-crud\resources\views/Pessoa/edit.blade.php ENDPATH**/ ?>