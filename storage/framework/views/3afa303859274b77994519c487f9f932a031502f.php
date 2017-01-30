<?php $__env->startSection('content'); ?>


<script type="text/javascript">
    $(document).ready( function() {
        $('#lieventos').addClass( 'active' );
        $('#lirelatorio').removeClass('active');
    } );
</script>
<div class="container" >
    <div class="row">
        <?php if(session('erro')): ?>
           <div class="alert alert-danger fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                 <?php echo session('erro'); ?>

            </div>
               
            
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="alert alert-success fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                 <?php echo session('success'); ?>

            </div>
               
        <?php endif; ?>
        
    </div>
    <div class="row">
        <div class="col-md-12 ">

                <div class="panel-body  col-md-12">

                    
                        
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Novo evento</button>
                        
                


                    <div class="modal fade " id="myModal" role="dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content col-md-10 col-md-push-1">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Novo Evento</h4>
                          </div>
                          <div class="modal-body">
                            
                          <div class="row">
                          
                    <div class="col-md-12">
           
                
            
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="<?php echo e(url('admin/eventos/register')); ?>">
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

                            <div class="col-md-8">
                                <textarea class="textarea form-control" name="descricao" rows="5" id="descricao"><?php echo old('descricao'); ?></textarea>

                                <?php if($errors->has('descricao')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('descricao')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>




                        <div class="form-group<?php echo e($errors->has('cargaHoraria') ? ' has-error' : ''); ?>">
                            <label for="vagas" class="col-md-4 control-label">Número de vagas</label>

                            <div class="col-md-2">
                                <input id="vagas" type="number" class="form-control" value="<?php echo e(old('vagas')); ?>" name="vagas" > 

                                <?php if($errors->has('vagas')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('vagas')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>                      



                        <div class="form-group<?php echo e($errors->has('cargaHoraria') ? ' has-error' : ''); ?>">
                            <label for="cargaHoraria" class="col-md-4 control-label">Carga Horaria</label>

                            <div class="col-md-2">
                                <input id="cargaHoraria" type="number" value="<?php echo e(old('cargaHoraria')); ?>" class="form-control" name="cargaHoraria" > 

                                <?php if($errors->has('cargaHoraria')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('cargaHoraria')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>                      


                   


                        <div class="form-group<?php echo e($errors->has('palestrante') ? ' has-error' : ''); ?>">
                            <label for="palestrante" class="col-md-4 control-label">Ministrante</label>

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
                                <input id="data_evento" type="date" class="form-control" name="data_evento" value="<?php echo e(old('data_evento')); ?>" min="<?php echo e(date('Y-m-d')); ?>" >

                                <?php if($errors->has('data_evento')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('data_evento')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('horario_evento') ? ' has-error' : ''); ?>">
                            <label for="horario_evento" class="col-md-4 control-label">Horario</label>

                            <div class="col-md-3">
                                <input id="horario_evento" type="time" class="form-control" name="horario_evento" value="<?php echo e(old('horario_evento')); ?>" >

                                <?php if($errors->has('horario_evento')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('horario_evento')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('data_inicio') ? ' has-error' : ''); ?>">
                            <label for="data_inicio" class="col-md-4 control-label">Data do início das inscrições</label>

                            <div class="col-md-3">
                                <input id="data_inicio" type="date" class="form-control" name="data_inicio" value="<?php echo e(old('data_inicio')); ?>" min="<?php echo e(date('Y-m-d')); ?>"  >

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
                                <input id="data_fim" type="date" class="form-control" name="data_fim" value="<?php echo e(old('data_fim')); ?>" min="<?php echo e(date('Y-m-d')); ?>"  >

                                <?php if($errors->has('data_fim')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('data_fim')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group<?php echo e($errors->has('banner') ? ' has-error' : ''); ?>">
                            <label for="banner" class="col-md-4 control-label">Banner</label>

                            <div class="col-md-3">
                                <input type="file" name="banner">
                            </div>
                        </div>


                        
       




                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar evento
                                </button>
                            </div>
                        </div>
                    </form>










                          </div>
                          
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          
                        </div>
                        
                      </div>
                    </div>
                </div>



                    <?php if(count($hoje)!==0): ?>

                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading" ><b style="color:green">Eventos Hoje</b></div>

                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Ministrante</th>
                                <th>Carga Horaria</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                                <th>Relatório</th>
                            </tr>

                            <?php $__currentLoopData = $hoje; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                
                                <tr>
                                    <td><a href="<?php echo e(url('user/evento/'.$evento->id)); ?>"><?php echo e($evento->nome); ?></a></td>
                                    <td><?php echo e($evento->palestrante); ?></td>
                                    <td><?php echo e($evento->cargaHoraria); ?> horas</td>
                                    <td><a href="<?php echo e(url('/admin/evento/'.$evento->id)); ?>"><i class="material-icons">mode_edit</i></a></td>
                                    <td><a href="<?php echo e(url('admin/eventos/delete/'.$evento->id)); ?>"><i class="material-icons">delete</i></a></td>
                                    <td><a href="<?php echo e(url('admin/eventos/relatorio/'.$evento->id)); ?>"><i class="material-icons">menu</i></a></td>
                                   
                                </tr>
                                

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  

                            </table>
                        </div>

                             
                    <?php endif; ?>

                    <hr>

                    <?php if(count($atuais)!==0): ?>

                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading"><b style="color:#36f">Inscrições abertas</b></div>

                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Ministrante</th>
                                <th>Carga Horaria</th>
                                <th>Data</th>
                                <th>Início das inscrições</th>
                                <th>Fim das inscrições</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                                <th>Relatório</th>
                            </tr>

                            <?php $__currentLoopData = $atuais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                
                                <tr>
                                    <td><a href="<?php echo e(url('user/evento/'.$evento->id)); ?>"><?php echo e($evento->nome); ?></a></td>
                                    <td><?php echo e($evento->palestrante); ?></td>
                                    <td><?php echo e($evento->cargaHoraria); ?> horas</td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_evento))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_inicio))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_fim))); ?></td>
                                    <td><a href="<?php echo e(url('/admin/evento/'.$evento->id)); ?>"><i class="material-icons">mode_edit</i></a></td>
                                    <td><a href="<?php echo e(url('admin/eventos/delete/'.$evento->id)); ?>"><i class="material-icons">delete</i></a></td>
                                    <td><a href="<?php echo e(url('admin/eventos/relatorio/'.$evento->id)); ?>"><i class="material-icons">menu</i></a></td>
                                </tr>
                                

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  

                            </table>
                        </div>

                             
                    <?php endif; ?>

                    <hr>
                    <?php if(count($futuros)!==0): ?>
                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading"><b style="color:orange">Inscrições futuras</b></div>

                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Ministrante</th>
                                <th>Carga Horaria</th>
                                <th>Data</th>
                                <th>Início das inscrições</th>
                                <th>Fim das inscrições</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                                <th>Relatório</th>
                            </tr>

                            <?php $__currentLoopData = $futuros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                
                                <tr>
                                    <td><a href="<?php echo e(url('user/evento/'.$evento->id)); ?>"><?php echo e($evento->nome); ?></a></td>
                                    <td><?php echo e($evento->palestrante); ?></td>
                                    <td><?php echo e($evento->cargaHoraria); ?> horas</td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_evento))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_inicio))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_fim))); ?></td>
                                    <td><a href="<?php echo e(url('/admin/evento/'.$evento->id)); ?>"><i class="material-icons">mode_edit</i></a></td>
                                    <td><a href="<?php echo e(url('admin/eventos/delete/'.$evento->id)); ?>"><i class="material-icons">delete</i></a></td>
                                    <td><a href="<?php echo e(url('admin/eventos/relatorio/'.$evento->id)); ?>"><i class="material-icons">menu</i></a></td>
                                </tr>
                                

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  

                            </table>
                        </div>
                        <hr>
                        <?php endif; ?> 
                        <?php if(count($passados)!==0): ?>
                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading"><b style="color:grey">Eventos passados</b></div>

                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Ministrante</th>
                                <th>Carga Horaria</th>
                                <th>Data</th>
                                <th>Início das inscrições</th>
                                <th>Fim das inscrições</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                                <th>Relatório</th>
                            </tr>

                            <?php $__currentLoopData = $passados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                
                                <tr>
                                    <td><a href="<?php echo e(url('user/evento/'.$evento->id)); ?>"><?php echo e($evento->nome); ?></a></td>
                                    <td><?php echo e($evento->palestrante); ?></td>
                                    <td><?php echo e($evento->cargaHoraria); ?> horas</td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_evento))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_inicio))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($evento->data_fim))); ?></td>
                                    <td><a href="<?php echo e(url('/admin/evento/'.$evento->id)); ?>"><i class="material-icons">mode_edit</i></a></td>
                                    <td><a href="<?php echo e(url('admin/eventos/delete/'.$evento->id)); ?>"><i class="material-icons">delete</i></a></td>
                                    <td><a href="<?php echo e(url('admin/eventos/relatorio/'.$evento->id)); ?>"><i class="material-icons">menu</i></a></td>
                                </tr>
                                

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  

                            </table>
                        </div>

                    
                        
                    <hr>

                    <?php endif; ?>
                    <?php if(count($passados)==0&&count($hoje)==0&&count($futuros)==0&&count($atuais)==0): ?>

                        <div class="alert alert-info">
                          Não existem eventos cadastrados atualmente!
                        </div>

                        
                    <?php endif; ?>
                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>


                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    //$('textarea').ckeditor();
    $('.textarea').ckeditor(); // if class is prefered.
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>