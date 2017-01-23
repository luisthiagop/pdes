<?php $__env->startSection('content'); ?>
<div class="container container-fluid">
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
    <h2>Relatório</h2>
    <div class="row-fluid">
        <div class="col-md-6 ">
            <p><b>Nome do evento:</b> <?php echo e($evento->nome); ?></p> 
            <p><b>Ministrante</b> <?php echo e($evento->palestrante); ?></p> 
            <p><b>Carga horária:</b> <?php echo e($evento->cargaHoraria); ?></p> 
            <p><b>Número de vagas:</b> <?php echo e($evento->vagas); ?></p> 
            <p><b>Número de inscritos:</b> <?php echo e($evento->inscritos); ?></p>


        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-6 pull-right">
        <p><b>Data:</b> <?php echo e(date('d/m/Y', strtotime($evento->data_evento))); ?></p> 
        <!---<p><b>Descrição</b> <?php echo $evento->descricao; ?></p>----> 
        


        </div>
    </div>

    <?php if(count($users)!=0): ?>
    <div class="row">
        <div class="col-md-12 ">    
                
            <div class="panel panel-default ">
                <div class="panel-heading"><h4>Lista de participantes</h4></div>
                <table class="table table-striped ">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Tipo</th>
                            <th>Curso</th>
                            <th>Instituição</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><b><?php echo e($user->name); ?></b></td>
                                    <td><?php echo e($user->cpf); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->fone); ?></td>
                                    <td><?php echo e($user->tipo); ?></td>
                                    <td><?php echo e($user->curso); ?></td>
                                    <td><?php echo e($user->instituicao); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                        </tbody>
                </table>                
            
            </div>
        </div>
        <a href="<?php echo e(url('admin/eventos/relatorio/export/'.$evento->id)); ?>"<button type="button" class="btn btn-primary">Gerar lista de presença</button></a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Adicionar por CPF</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Adicionar usuário por CPF</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="<?php echo e(url('admin/eventos/register_by_cpf')); ?>">
                            <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" value="<?php echo e($evento->id); ?>">

                                <div class="form-group<?php echo e($errors->has('cpf') ? ' has-error' : ''); ?>">
                                    <label for="cpf" class="col-md-4 control-label">CPF</label>

                                    <div class="col-md-6">
                                        <input id="cpf" type="text" class="form-control" name="cpf" value="<?php echo e(old('cpf')); ?>"  autofocus>

                                        <?php if($errors->has('cpf')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('cpf')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Adicionar participante</button>
                                </div>

                            </form>
                        </div>
                        
                    </div>
              </div>
        </div>


    </div>
    

    <?php endif; ?>


      

</div>
    <?php if(count($users)==0): ?>
    <div class="container container-fluid">
        <div class="alert alert-info">
          Ainda ninguém se cadastrou para esse evento!
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>