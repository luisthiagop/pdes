<?php $__env->startSection('content'); ?>
<?php if(count($evento)==0): ?>
    <div class="container">        
        <div class="alert alert-info">
          <strong></strong> Evento não disponível.
        </div>
    </div>

<?php else: ?>


<script>
  function onSubmit(token) {
    alert('thanks ' + document.getElementById('field').value);
  }

  function validate(event) {
    event.preventDefault();
    if (!document.getElementById('field').value) {
      alert("You must add text to the required field");
    } else {
      grecaptcha.execute();
    }
  }

  function onload() {
    var element = document.getElementById('submit');
    element.onclick = validate;
  }
</script>

<div class="container">
    
    <div class="row">
        <div class="col-md-7"> 
         <?php if($evento->has_banner): ?>
            <div>
                <div class="col-md-12"  style="
                    
                    height:300px; width:600px;
                    background: url('<?php echo e(asset('assets/upload/imagens_eventos/'.$evento->id.'.jpg')); ?> ');
                    background-size: 600px 300px;
                    background-repeat: no-repeat;
                  " class="col-md-12">
                    
                </div>
                <br>
            </div>
            <?php endif; ?>
        </div>
        <?php if($evento->data_evento>date('Y-m-d') || ($evento->data_evento==date('Y-m-d')&& $evento->horario_evento>date('H:i:s'))): ?>
        
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1><?php echo e($evento->nome); ?></h1>
            <p><b>Descrição: </b><?php echo $evento->descricao; ?></p>
            <p><b>Mais: </b><?php echo $evento->mais_sobre; ?></p>
            <p><b>Ministrante: </b><?php echo e($evento->palestrante); ?></p>
            <p><b>Carga Horária:</b> <?php echo e($evento->cargaHoraria); ?> <?php if($evento->cargaHoraria != 1): ?>horas <?php else: ?> hora <?php endif; ?></p>
            <p><b>Data do Evento: </b><?php echo e(date('d/m/Y', strtotime($evento->data_evento))); ?> <b>Horario do Evento: </b><?php echo e($evento->horario_evento); ?></p>
            <p><b>Início  das inscrições: </b><?php echo e(date('d/m/Y', strtotime($evento->data_inicio))); ?> - <b>Fim  das inscrições: </b><?php echo e(date('d/m/Y', strtotime($evento->data_fim))); ?></p>
            <p><b>Vagas disponíveis: </b><?php echo e($evento->vagas-$evento->inscritos); ?></p>
        </div>

        
    </div>
    <div class="col-md-5">
            
            <?php if(!count($participa) && Auth::user()): ?>
                <form id="form-actions"  method="POST" action="<?php echo e(url('user/evento/participar/')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($evento->id); ?>">
                    
                    <input type="submit" class="btn btn-success" value="Participar">
                    
                   
                


                </form>
            <?php elseif(count($participa) && Auth::user()): ?>
                <form id="form-actions" method="POST" action="<?php echo e(url('user/evento/sair/')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($evento->id); ?>">
                    
                    <input type="submit" class="btn btn-danger" value="Cancelar participação" >
                    
                    
                </form>

            <?php endif; ?>

        
        </div>
    <?php endif; ?>


       
    </div>
</div>

<script>
    onload();
</script>



        <?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>