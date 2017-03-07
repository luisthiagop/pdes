<?php $__env->startSection('content'); ?>


<script type="text/javascript">
    $(document).ready( function() {
        $('#lieventos').addClass( 'active' );
        $('#lirelatorio').removeClass('active');
    } );
</script>
<div class="container" >

    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <span>Alguns campos foram preenchidos errados, ou foram esquecidos</span>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12 ">

                <div class="panel-body  col-md-12">

                    
                        
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Novo evento</button>
                          <hr>
                        
                


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
                                <textarea class=" form-control" name="descricao" rows="5" ><?php echo old('descricao'); ?></textarea>

                                <?php if($errors->has('descricao')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('descricao')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('mais_sobre') ? ' has-error' : ''); ?>">
                            <label for="mais_sobre" class="col-md-4 control-label">Mais sobre</label>

                            <div class="col-md-8">
                                <textarea class="textarea form-control" name="mais_sobre" rows="5" id="mais_sobre"><?php echo old('mais_sobre'); ?></textarea>

                                <?php if($errors->has('mais_sobre')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('mais_sobre')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('local') ? ' has-error' : ''); ?>">
                            <label for="local" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local" type="text" class="form-control" name="local" value="<?php echo e(old('local')); ?>"  autofocus>

                                <?php if($errors->has('local')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('local')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>




                        <div class="form-group<?php echo e($errors->has('vagas') ? ' has-error' : ''); ?>">
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
                            <label for="cargaHoraria" class="col-md-4 control-label">Carga Horária</label>

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

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                              Quem pode ver o evento?
                            </label>

                            <div class="col-md-6">
                                <table class="table table-hover">
                                <tr>
                                    <td>Agentes</td>
                                    <td>
                                       
                                            Sim <input checked name="rb_agente" type="radio" value="1">
                                    </td>
                                    <td>
                                       
                                            Não <input name="rb_agente" type="radio" value="0">

                                    </td>
                                </tr>

                                <tr>
                                    <td>Alunos</td>
                                    <td>
                                       
                                            Sim <input checked name="rb_aluno" type="radio" value="1">
                                    </td>
                                    <td>
                                       
                                            Não <input name="rb_aluno" type="radio" value="0">

                                    </td>

                                    
                                </tr>

                                <tr>
                                    
                                    <td>Comunidade</td>
                                    <td>
                                       
                                            Sim <input checked name="rb_comunidade" type="radio" value="1">
                                    </td>
                                    <td>
                                       
                                            Não <input name="rb_comunidade" type="radio" value="0">

                                    </td>
                                   
                                </tr>

                                <tr>
                                    
                                    <td>Professores</td>
                                    <td>
                                       
                                            Sim <input checked name="rb_professor" type="radio" value="1">
                                    </td>
                                    <td>
                                       
                                            Não <input name="rb_professor" type="radio" value="0">

                                    </td>
                                </tr>





                                </table>
                            </div>
                        </div>

                        <hr>


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




<span style="color:silver;font-size: 12px;">* As datas não poderão ser alteradas, caso isso seja necessário, crie um novo evento ou entre em contato com o NTI para saber mais.<br>* As imagens devem ser no formato JPEG</span>
                          <br><br>




                          </div>
                          
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><br>
                            
                        </div>
                        
                      </div>
                    </div>
                </div>

                <h2> Eventos</h2>
                    <ul class="nav nav-tabs">                        
                        <li class="active"><a data-toggle="tab" href="#atuais">Inscrições abertas</a></li>
                        <li><a data-toggle="tab" href="#hoje">Eventos de Hoje</a></li>
                        <li><a data-toggle="tab" href="#futuros">Eventos futuros</a></li>
                        <li><a data-toggle="tab" href="#passados">Eventos passados</a></li>
                    </ul>

                    <div class="tab-content">
                        


                        <div id="atuais" class="tab-pane fade in active">
                            <h3>Inscrições abertas</h3>
                            <?php if(count($atuais)!==0): ?>

                                <div class="panel panel-default" style="margin-top:20px;">
                                    <div class="panel-heading"><b style="color:#36f">Inscrições abertas</b></div>

                            
                                    <table class="table table-bordered">
                                    <tr>
                                        <th>Evento</th>
                                        <th>Ministrante</th>
                                        <th>Carga Horária</th>
                                        <th>Data</th>
                                        <th>Início das inscrições</th>
                                        <th>Fim das inscrições</th>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                        <th>Relatório</th>
                                    </tr>

                                    <?php $__currentLoopData = $atuais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
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
                                        

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                                    </table>
                                </div>

                                     
                            <?php else: ?>                            

                                <div class="alert alert-info">
                                  Não existem eventos cadastrados atualmente!
                                </div>

                                
                            <?php endif; ?>
                        </div>


                        <div id="hoje" class="tab-pane fade">
                            <h3>Eventos Hoje</h3>
                            <?php if(count($hoje)!==0): ?>

                                <div class="panel panel-default" style="margin-top:20px;">
                                    <div class="panel-heading" ><b style="color:green">Eventos Hoje</b></div>

                            
                                    <table class="table table-bordered">
                                    <tr>
                                        <th>Evento</th>
                                        <th>Ministrante</th>
                                        <th>Carga Horária</th>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                        <th>Relatório</th>
                                    </tr>

                                    <?php $__currentLoopData = $hoje; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <tr>
                                            <td><a href="<?php echo e(url('user/evento/'.$evento->id)); ?>"><?php echo e($evento->nome); ?></a></td>
                                            <td><?php echo e($evento->palestrante); ?></td>
                                            <td><?php echo e($evento->cargaHoraria); ?> horas</td>
                                            <td><a href="<?php echo e(url('/admin/evento/'.$evento->id)); ?>"><i class="material-icons">mode_edit</i></a></td>
                                            <td><a href="<?php echo e(url('admin/eventos/delete/'.$evento->id)); ?>"><i class="material-icons">delete</i></a></td>
                                            <td><a href="<?php echo e(url('admin/eventos/relatorio/'.$evento->id)); ?>"><i class="material-icons">menu</i></a></td>
                                           
                                        </tr>
                                        

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                                    </table>
                                </div>

                                     
                             <?php else: ?>                            

                                <div class="alert alert-info">
                                  Não existem eventos cadastrados atualmente!
                                </div>

                                
                            <?php endif; ?>
                        </div>


                        <div id="futuros" class="tab-pane fade">
                            <h3>Eventos futuros</h3>
                            <?php if(count($futuros)!==0): ?>
                                <div class="panel panel-default" style="margin-top:20px;">
                                    <div class="panel-heading"><b style="color:orange">Inscrições futuras</b></div>

                            
                                    <table class="table table-bordered">
                                    <tr>
                                        <th>Evento</th>
                                        <th>Ministrante</th>
                                        <th>Carga Horária</th>
                                        <th>Data</th>
                                        <th>Início das inscrições</th>
                                        <th>Fim das inscrições</th>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                        <th>Relatório</th>
                                    </tr>

                                    <?php $__currentLoopData = $futuros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
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
                                        

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                                    </table>
                                </div>
                                <hr>
                            <?php else: ?>                            

                                <div class="alert alert-info">
                                  Não existem eventos cadastrados atualmente!
                                </div>

                                
                            <?php endif; ?>
                        </div>


                        <div id="passados" class="tab-pane fade">
                            <h3>Eventos passados</h3>
                                <?php if(count($passados)!==0): ?>
                                <div class="panel panel-default" style="margin-top:20px;">
                                    <div class="panel-heading"><b style="color:grey">Eventos passados</b></div>

                            
                                    <table class="table table-bordered">
                                    <tr>
                                        <th>Evento</th>
                                        <th>Ministrante</th>
                                        <th>Carga Horária</th>
                                        <th>Data</th>
                                        <th>Início das inscrições</th>
                                        <th>Fim das inscrições</th>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                        <th>Relatório</th>
                                    </tr>

                                    <?php $__currentLoopData = $passados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
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
                                        

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                                    </table>
                                </div>

                            
                                
                            <hr>

                            <?php else: ?>                            

                                <div class="alert alert-info">
                                  Não existem eventos cadastrados atualmente!
                                </div>

                                
                            <?php endif; ?>
                        </div>
                    </div>



                    

                    

                    

                   
                     
                        
                    
                    


                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
<script>
    //$('textarea').ckeditor();
    $('.textarea').ckeditor(); // if class is prefered.
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>