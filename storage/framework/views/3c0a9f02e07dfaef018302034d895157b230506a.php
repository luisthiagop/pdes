<?php $__env->startSection('content'); ?>
  
<script type="text/javascript">
    $(document).ready( function() {
        $('#lieventosc').addClass( 'active' );
        $('#lieventos').removeClass('active');
    } );
</script>
<div class="container" >
    <div class="row">
        <div class="col-md-12 ">
        
                <?php echo $__env->make('user.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="panel-body  col-md-10">
                    
      
                
                    <div class="modal fade " id="myModal" role="dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content col-md-8 col-md-push-2">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Novo Evento</h4>
                          </div>
                          <div class="modal-body">
                            
                          <div class="row">
                          
                    <div class="col-md-12">
           
                
            
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('admin/eventos/register')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('nome') ? ' has-error' : ''); ?>">
                            <label for="nome" class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="<?php echo e(old('nome')); ?>"  autofocus>
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
                                <textarea class="form-control" name="descricao" rows="5" id="descricao"></textarea>
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
                                <input id="cargaHoraria" type="number" class="form-control" name="cargaHoraria" > 
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
                          
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          
                        </div>
                        
                      </div>
                    </div>
                    <?php if(count($eventos)!==0): ?>
                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading">Lista de eventos cadastrados</div>
                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Palestrante</th>
                                <th>Carga Horaria</th>
                                <th>Data</th>
                                <th>Início das inscrições</th>
                                <th>Fim das inscrições</th>
                                
                            </tr>
                            
                            <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td><a href="<?php echo e(url('user/evento/'.$evento->id)); ?>"><?php echo e($evento->nome); ?></a></td>
                                    <td><?php echo e($evento->palestrante); ?></td>
                                    <td><?php echo e($evento->cargaHoraria); ?> horas</td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_evento))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_inicio))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_fim))); ?></td>
                                    
                                </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                            </table>
                        </div>
                    <?php else: ?> 
                       
                        <div class="alert alert-info" style="margin-top: 15px;">
                            Você não está em nenhum evento!
                        </div>
                        
                    <?php endif; ?>
                    
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>