<?php $__env->startSection('content'); ?>
<?php if(count($evento)==0): ?>
    <div class="container">
       
        <div class="alert alert-info">
          <strong></strong> Evento não disponível.
        </div>
    </div>

<?php else: ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <h1><?php echo e($evento->nome); ?></h1>
            <p><b>Descrição: </b><?php echo e($evento->descricao); ?></p>
            <p><b>Palestrante: </b><?php echo e($evento->palestrante); ?></p>
            <p><b>Carga Horaria:</b> <?php echo e($evento->cargaHoraria); ?> <?php if($evento->cargaHoraria != 1): ?>horas <?php else: ?> hora <?php endif; ?></p>
            <p><b>Data do Evento: </b><?php echo e(date('d/m/Y', strtotime($evento->data_evento))); ?></p>
            <p><b>Início  das inscrições: </b><?php echo e(date('d/m/Y', strtotime($evento->data_inicio))); ?> - <b>Fim  das inscrições: </b><?php echo e(date('d/m/Y', strtotime($evento->data_fim))); ?></p>
        </div>
    </div>
</div>
<?php if(!count($participa)): ?>
    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('user/evento/participar/')); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="id" value="<?php echo e($evento->id); ?>">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Confirmar participação
            </button>
        </div>

    </form>
<?php else: ?>
    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('user/evento/sair/')); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="id" value="<?php echo e($evento->id); ?>">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-danger">
                Cancelar participação
            </button>
        </div>

    </form>

<?php endif; ?>


<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>