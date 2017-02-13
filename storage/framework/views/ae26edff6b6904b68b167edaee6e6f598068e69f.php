<?php $__env->startSection('content'); ?>

<script type="text/javascript">
    $(document).ready( function() {
        $('#lieventos').addClass( 'active' );
        $('#lirelatorio').removeClass('active');
    } );
</script>
<div class="container" >
      

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Próximos eventos</a></li>
            <li><a data-toggle="tab" href="#menu1">Eventos passados</a></li>
            <li><a data-toggle="tab" href="#menu2">Eventos cadastrados</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Próximos eventos</h3>

                <?php if(count($eventos)!=0): ?>
                    <div class="row">
                        <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                            <div  class="col-md-3" style="
                            hover:box-shadow: 3px 3px #0Bf;
                            <?php if($e->has_banner): ?>
                                border: 1px solid silver;
                                padding:0px;
                                border-radius:15px;
                                margin: 10px;
                                height: 300px;
                                background: url('<?php echo e(asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')); ?>') no-repeat  left top;
                                background-size: 100% 50%;
                             <?php else: ?>
                                border: 1px solid silver;
                                padding:0px;
                                border-radius:15px;
                                margin: 10px;
                                height: 150px;
                             <?php endif; ?> ">

                                <div style="
                                <?php if($e->has_banner): ?>
                                    bottom: 5px;
                                    padding: 0px;
                                    padding-left:5px;
                                    position: absolute;
                                    width: 100%;
                                    height: 50%;
                                    margin: 0px;
                                <?php else: ?> padding-left:5px ;
                                    padding-top: 0px;
                                <?php endif; ?>">


                                <h3 style="margin-top: 5px;" ><?php echo e($e->nome); ?></h3>
                                <span>Data: <?php echo e($e->data_evento); ?></span><br>
                                <span>horario: <?php echo e($e->horario_evento); ?></span><br>
                                <span>Ministrante: <?php echo e($e->palestrante); ?></span>
                                
                                </div>
                                <a href="<?php echo e(url('user/evento/'.$e->id)); ?>">
                                    <button style=" position: absolute;bottom:3%;right: 10px" class="btn btn-primary btn-xs"> Ler mais</button>
                                </a>
                            </div>
                            
                            

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info" style="margin-top: 15px;">
                        Não existe nenhum evento que você possa se cadastrar!
                    </div>

                <?php endif; ?>

            </div>




            <div id="menu1" class="tab-pane fade">
                <h3>Eventos passados</h3>
                
                <?php if(count($eventos_passados)!=0): ?>
                    <div class="row">
                                                   
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
                                <th>Veja como foi</th>                                
                            </tr>

                            <?php $__currentLoopData = $eventos_passados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td><a  href="<?php echo e(url('user/evento/'.$e->id)); ?>"><?php echo e($e->nome); ?></a></td>
                                    <td><?php echo e($e->palestrante); ?></td>
                                    <td><?php echo e($e->cargaHoraria); ?> horas</td>
                                    <td><?php echo e(date('d/m/Y', strtotime($e->data_evento))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($e->data_inicio))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($e->data_fim))); ?></td>
                                    <td><a target="_blank" href="<?php echo e($e->fb_link); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></td>

                                    
                                </tr>
                                

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                            </table>
                        </div>

                    </div>
                <?php else: ?>
                    <div class="alert alert-info" style="margin-top: 15px;">
                        Não existe nenhum evento passado!
                    </div>

                <?php endif; ?>




            </div>






            <div id="menu2" class="tab-pane fade">
                <h3>Eventos cadastrados</h3>
                 <?php if(count($eventos_cadastrados)!=0): ?>
                    <div class="row">
                                                   
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
                            </tr>

                            <?php $__currentLoopData = $eventos_cadastrados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td><a href="<?php echo e(url('user/evento/'.$e->id)); ?>"><?php echo e($e->nome); ?></a></td>
                                    <td><?php echo e($e->palestrante); ?></td>
                                    <td><?php echo e($e->cargaHoraria); ?> horas</td>
                                    <td><?php echo e(date('d/m/Y', strtotime($e->data_evento))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($e->data_inicio))); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($e->data_fim))); ?></td>
                                    
                                    
                                </tr>
                                

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                            </table>
                        </div>

                    </div>
                <?php else: ?>
                    <div class="alert alert-info" style="margin-top: 15px;">
                        Você nunca participou de um evento!
                    </div>

                <?php endif; ?>




            </div>



        </div> 


    

</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>