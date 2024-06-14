<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <style>
        .c{
            margin-left:50px;
            padding: 10px;
        }
      
        
    </style>
</head>
<body>
<div class="container mt-5">
    <h1> Lista de Pessoas </h1>
    <?php if($message = Session::get('sucess')): ?>
        <div class="alert alert-sucess">
            <?php echo e(messagw); ?>

        </div>
    <?php endif; ?>
    <a href="<?php echo e(route('pessoa.create')); ?>">Adicionar Pessoa</a><br><br><br>
    <div class="c">
        <table class="table table-boardered">
        <thead>
        <tr>
            <td><h2><strong>Nome</strong></h2></td>
            <td><h2><strong>Telefone</strong></h2></td> 
        </tr>
        </thead>
        <?php $__currentLoopData = $pessoa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($p->nome); ?></td>
            <td><?php echo e($p->telefone); ?></td>
            <td>
                <a class="c" href="<?php echo e(route('pessoa.edit', $p->id)); ?>" class="btn btn-info">Editar</a><br>
                <form class= "c" action="<?php echo e(route('pessoa.destroy', $p->id)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger" >Deletar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </table>
    </div.c>
</body>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"> </script>

<script>
    var table = new DataTable('#tabela', {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',  //Traduz os campos (Descrição, pesquisa, próximo, ultimo...)Para Português do Brasil
        },
    });
</script>
    
</div>

</html><?php /**PATH C:\Users\di-pi\OneDrive - Fatec Centro Paula Souza\5_quinto_semestre\Programação Web\projeto-crud\projeto-crud\resources\views/pessoa/index.blade.php ENDPATH**/ ?>