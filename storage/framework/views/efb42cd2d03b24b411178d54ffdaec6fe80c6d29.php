
<?php $__env->startComponent('mail::message'); ?>
# Participação cancelada
<?php echo e($user->name); ?> você saiu do evento <?php echo e($evento->nome); ?>.

<br>
Caso queira cadastar novamente clique no botão
<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
	Ir para a página do evento
<?php echo $__env->renderComponent(); ?>

<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>