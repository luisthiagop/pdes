<?php $__env->startSection('content'); ?>
<?php if(count($e)==0): ?>
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
    <h2><?php echo e($e->nome); ?></h2>
    <span style="font-size: 12px;color grey"><?php echo e(date("d",strtotime($e->data_evento))); ?> de  <?php echo e(date("M",strtotime($e->data_evento))); ?> de <?php echo e(date("Y",strtotime($e->data_evento))); ?></span>

    <hr>
    <?php if($e->has_banner): ?>
        <div class="row">
            <div class="col-md-5" >
                <p style="text-align: justify;"> <?php echo e($e->descricao); ?></p>
            </div>
            <div class="col-md-7" >
                 <div class="col-md-12"  style="
                    
                    height:300px; width:600px;
                    background: url('<?php echo e(asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')); ?> ');
                    background-size: 600px 300px;
                    background-repeat: no-repeat;
                  " class="col-md-12">
                    
                </div>
            </div>

        </div>

    <?php else: ?>
        <div >
                <p style="text-align: justify;"> <?php echo e($e->descricao); ?></p>
            </div>
    <?php endif; ?>
    <hr>

    <h3>Detalhes do evento</h3>
    <ul>
        <li>
            <b>Data: </b><?php echo e(date("d",strtotime($e->data_evento))); ?> de  <?php echo e(date("M",strtotime($e->data_evento))); ?> de <?php echo e(date("Y",strtotime($e->data_evento))); ?>

        </li>
        <li>
            <b>Data final das inscrições: </b><?php echo e(date("d",strtotime($e->data_fim))); ?> de  <?php echo e(date("M",strtotime($e->data_fim))); ?> de <?php echo e(date("Y",strtotime($e->data_fim))); ?>

        </li>
        <li>
            <b>Local: </b><?php echo e($e->local); ?>

        </li>
        <li>
            <b>Ministrante: </b><?php echo e($e->palestrante); ?>

        </li>
        <li>
            <b>Carga Horária: </b><?php echo e($e->cargaHoraria); ?>

        </li>
        <li>
            <b>Horário de início: </b><?php echo e(date("H:i",strtotime($e->horario_evento))); ?>

        </li>
        <li>
            <b>Público alvo: </b><?php if($e->aluno): ?> alunos | <?php endif; ?> <?php if($e->agente): ?>agentes | <?php endif; ?> <?php if($e->comunidade): ?>comunidade | <?php endif; ?> <?php if($e->professor): ?>professores   <?php endif; ?>
        </li>
        <li>
            <b>Número de vagas: </b><?php echo e($e->vagas); ?>

        </li>
    </ul>

    <hr>
    <h3>Mais sobre</h3>
    <p style="text-align: justify;"><?php echo $e->mais_sobre; ?></p>


    <hr>

    

        
        


    <span style="color:silver"><?php echo e($e->vagas-$e->inscritos); ?> vagas disponíveis</span>
    <?php if($e->data_evento>date('Y-m-d') || ($e->data_evento==date('Y-m-d')&& $e->horario_evento>date('H:i:s'))): ?>
   

    <div class="col-md-5">
            
            <?php if(!count($participa) && Auth::user() && $e->vagas-$e->inscritos > 0): ?>
                <form id="form-actions"  method="POST" action="<?php echo e(url('user/evento/participar/')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($e->id); ?>">
                    
                    <input type="submit" class="btn btn-success" value="Participar">
                    
                   
                


                </form>
            <?php elseif(count($participa) && Auth::user()): ?>
                <form id="form-actions" method="POST" action="<?php echo e(url('user/evento/sair/')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($e->id); ?>">
                    
                    <input type="submit" class="btn btn-danger" value="Cancelar participação" >
                    
                    
                </form>

            <?php endif; ?>

        
    </div>
    <?php endif; ?>
    <?php endif; ?>

    



</div>

<script>
    onload();
</script>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>