<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Admin</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('eventos/register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('nome') ? ' has-error' : ''); ?>">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="<?php echo e($evento->nome); ?>"  autofocus>

                                <?php if($errors->has('nome')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nome')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('descricao') ? ' has-error' : ''); ?>">
                            <label for="descricao" class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="descricao" rows="5" id="descricao"><?php echo e($evento->descricao); ?></textarea>

                                <?php if($errors->has('descricao')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('descricao')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('cargaHoraria') ? ' has-error' : ''); ?>">
                            <label for="cargaHoraria" class="col-md-4 control-label">Carga Horaria</label>

                            <div class="col-md-2">
                                <input id="cargaHoraria" type="number" class="form-control" <?php echo e($evento->nome); ?> name="cargaHoraria" > 

                                <?php if($errors->has('cargaHoraria')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('cargaHoraria')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>                      


                   


                        <div class="form-group<?php echo e($errors->has('palestrante') ? ' has-error' : ''); ?>">
                            <label for="palestrante" class="col-md-4 control-label">Palestrante</label>

                            <div class="col-md-6">
                                <input id="palestrante" class="form-control" name="palestrante" value="<?php echo e(old('palestrante')); ?>" >

                                <?php if($errors->has('palestrante')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('palestrante')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group<?php echo e($errors->has('data_evento') ? ' has-error' : ''); ?>">
                            <label for="data_evento" class="col-md-4 control-label">Data do evento</label>

                            <div class="col-md-3">
                                <input id="data_evento" type="date" class="form-control" name="data_evento" value="<?php echo e(old('data_evento')); ?>" >

                                <?php if($errors->has('data_evento')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('data_evento')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('data_inicio') ? ' has-error' : ''); ?>">
                            <label for="data_inicio" class="col-md-4 control-label">Data do início das inscrições</label>

                            <div class="col-md-3">
                                <input id="data_inicio" type="date" class="form-control" name="data_inicio" value="<?php echo e(old('data_inicio')); ?>" >

                                <?php if($errors->has('data_inicio')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('data_inicio')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>




                        <div class="form-group<?php echo e($errors->has('data_fim') ? ' has-error' : ''); ?>">
                            <label for="data_fim" class="col-md-4 control-label">Data final das inscrições</label>

                            <div class="col-md-3">
                                <input id="data_fim" type="date" class="form-control" name="data_fim" value="<?php echo e(old('data_fim')); ?>" >

                                <?php if($errors->has('data_fim')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('data_fim')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        





                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>


                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>