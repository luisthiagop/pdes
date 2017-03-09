<?php $__env->startSection('content'); ?>

<div class="container">
    <h2><?php echo e($e->nome); ?></h2>
    <span style="font-size: 12px;color grey"><?php echo e(date("d",strtotime($e->data_evento))); ?> de  <?php echo e(date("M",strtotime($e->data_evento))); ?> de <?php echo e(date("Y",strtotime($e->data_evento))); ?></span>

    <hr>
        <p style="text-align: justify;"> <?php echo e($e->descricao); ?></p>
    <hr>

    <h3>Detalhes do evento</h3>
    <ul>
        <li>
            <b>Data: </b><?php echo e(date("d",strtotime($e->data_evento))); ?> de  <?php echo e(date("M",strtotime($e->data_evento))); ?> de <?php echo e(date("Y",strtotime($e->data_evento))); ?>

        </li>
        <li>
            <b>Local: </b><?php echo e($e->local); ?>

        </li>
        <li>
            <b>Ministrante: </b><?php echo e($e->palestrante); ?>

        </li>
        <li>
            <b>Carga Horária: </b><?php echo e($e->cargaHoraria); ?>

        </li>
        <li>
            <b>Horário de início: </b><?php echo e(date("H:i",strtotime($e->horario_evento))); ?>

        </li>
    </ul>

    <hr>
    <h3>Mais sobre</h3>
    <?php echo $e->mais_sobre; ?>



</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>