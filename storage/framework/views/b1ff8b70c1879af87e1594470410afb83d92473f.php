<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <?php if(session('erro')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('erro')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo session('success'); ?>

            </div>
        <?php endif; ?>
        
    </div>
    <?php if($evento): ?>
    <div class="row">
        <div class="col-md-12 ">
            <h1>Deletar <?php echo e($evento->nome); ?>?</h1>
            <p><b>Descrição: </b><?php echo $evento->descricao; ?></p>
            <p><b>Palestrante: </b><?php echo e($evento->palestrante); ?></p>
            <p><b>Carga Horaria:</b> <?php echo e($evento->cargaHoraria); ?> <?php if($evento->cargaHoraria != 1): ?>horas <?php else: ?> hora <?php endif; ?></p>
            <p><b>Data do Evento: </b><?php echo e(date('d/m/Y', strtotime($evento->data_evento))); ?></p>
            <p><b>Início  das inscrições: </b><?php echo e(date('d/m/Y', strtotime($evento->data_inicio))); ?> - <b>Fim  das inscrições: </b><?php echo e(date('d/m/Y', strtotime($evento->data_fim))); ?></p>
        </div>

        <form method="post" action="<?php echo e(url('admin/eventos/deletar')); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" value="<?php echo e($evento->id); ?>">

            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-danger">
                    Deletar Evento
                </button>
            </div>


        </form>
    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>