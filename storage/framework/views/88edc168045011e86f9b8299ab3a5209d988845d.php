<?php $__env->startSection('content'); ?>



<div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Inscrições abertas</a></li>
      <li><a data-toggle="tab" href="#menu1">Eventos Futuros</a></li>
      <li><a data-toggle="tab" href="#menu2">Eventos passados</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h2>Inscrições abertas</h2>

        <hr>
        <?php $__currentLoopData = $eventos_atuais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="">
                <h3>
                    <a target="_blank" href="<?php echo e(url('verify/'.$e->id)); ?>">                        
                          <?php echo e($e->nome); ?>                    
                    </a>
                    <span style="font-size:12px;background: #27b6f7;"><?php echo e(date("d/m/Y",strtotime($e->data_inicio))); ?></span>

                </h3>

                
                
                

                
                <span class="eo-eb-event-meta"></span>
                
            </div>

            <?php if($e->has_banner): ?> 
            <div>
                <a target="_blank" href="">
                    <img width="370" height="200" src="<?php echo e(asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')); ?> " alt="" srcset="" sizes="(max-width: 470px) 100vw, 170px">
                </a>
            </div>
            <?php endif; ?>
                    
            <p align="justify"><?php echo $e->descricao; ?></p>

            <p align="justify">
                <b>Ministrante:</b> <?php echo e($e->palestrante); ?><br>
                <b>Local:</b> <?php echo $e->local; ?><br>
                <b>Horário:</b> <?php echo e(date("H:i",strtotime($e->horario_evento))); ?>

            </p>
            <a target="_blank" href="<?php echo e(url('verify/'.$e->id)); ?>">
                <button class="btn btn-sm btn-info">Ver mais</button>
            </a>

            

            
     
                

            <hr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($eventos_atuais->links()); ?>


        <?php if(!count($eventos_atuais)): ?><p>Não existem eventos atuais.</p><?php endif; ?>
      </div>
      <div id="menu1" class="tab-pane fade">
        <h2>Eventos anunciados</h2>

                <hr>
                <?php $__currentLoopData = $eventos_futuros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="">
                        <h3>
                            <a target="_blank" href="<?php echo e(url('verify/'.$e->id)); ?>">                      
                                  <?php echo e($e->nome); ?>                    
                            </a>
                            <span style="font-size:12px;background: #27b6f7;"><?php echo e(date("d/m/Y",strtotime($e->data_inicio))); ?></span>

                        </h3>

                        
                        
                        

                        
                        <span class="eo-eb-event-meta"></span>
                        
                    </div>

                    <?php if($e->has_banner): ?> 
                    <div>
                        <a target="_blank" href="">
                            <img width="370" height="200" src="<?php echo e(asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')); ?> " alt="" srcset="" sizes="(max-width: 470px) 100vw, 170px">
                        </a>
                    </div>
                    <?php endif; ?>
                            
                    <p align="justify"><?php echo $e->descricao; ?></p>

                    <p align="justify">
                        <b>Ministrante:</b> <?php echo e($e->palestrante); ?>

                        <b>Local:</b> <?php echo $e->local; ?><br>
                        <b>Horário:</b> <?php echo e(date("H:i",strtotime($e->horario_evento))); ?>

                    </p>
                    <a target="_blank" href="<?php echo e(url('verify/'.$e->id)); ?>">
                        <button class="btn btn-sm btn-info">Ver mais</button>
                    </a>
                            
                    

                    
             
                        

                    <hr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo e($eventos_futuros->links()); ?>


                <?php if(!count($eventos_futuros)): ?><p>Não existem eventos futuros.</p><?php endif; ?>
      </div>
      <div id="menu2" class="tab-pane fade">
        <h2>Eventos passados</h2>

        <hr>
        <?php $__currentLoopData = $eventos_passados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="">
                <h3>
                    <a target="_blank" href="<?php echo e(url('verify/'.$e->id)); ?>">                        
                          <?php echo e($e->nome); ?>                    
                    </a>
                    <span style="font-size:12px;background: #27b6f7;"><?php echo e(date("d/m/Y",strtotime($e->data_inicio))); ?></span>

                </h3>

                
                
                

                
                <span class="eo-eb-event-meta"></span>
                
            </div>

            <?php if($e->has_banner): ?> 
            <div>
                <a target="_blank" href="">
                    <img width="370" height="200" src="<?php echo e(asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')); ?> " alt="" srcset="" sizes="(max-width: 470px) 100vw, 170px">
                </a>
            </div>
            <?php endif; ?>
                    
            <p align="justify"><?php echo $e->descricao; ?></p>

            <p align="justify">
                Ministrante: <?php echo e($e->palestrante); ?>

                Local: <?php echo $e->local; ?><br>
                Horário: <?php echo e(date("H:i",strtotime($e->horario_evento))); ?>

            </p>
            <?php if($e->fb_link != "http://"): ?>
            <a target="_blank" href="<?php echo e($e->fb_link); ?>"> 
                <button class="btn btn-sm btn-info"> <i class="fa fa-facebook" aria-hidden="true"></i>
</button>
            </a>
            <?php endif; ?>           
            

            <a target="_blank" href="<?php echo e(url('verify/'.$e->id)); ?>">
                <button class="btn btn-sm btn-info">Ver mais</button>
            </a>
                    
            

            
        
                

            <hr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($eventos_passados->links()); ?>


        <?php if(!count($eventos_passados)): ?><p>Não existem eventos passados.</p><?php endif; ?>
      </div>
    </div>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>