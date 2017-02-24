
<?php $__env->startComponent('mail::message'); ?>
# Participação confirmada
<?php echo e($user->name); ?> você esta <?php if($user->sexo = 'M'): ?>cadastrado <?php else: ?> cadastrada <?php endif; ?> no evento <?php echo e($evento->nome); ?>


<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
	Ir para a página do evento
<?php echo $__env->renderComponent(); ?>

<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>