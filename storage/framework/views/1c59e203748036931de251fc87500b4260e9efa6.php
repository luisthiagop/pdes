<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a style=" width: 270px !important;" class="navbar-brand" href="http://localhost:8000">
                        Programa DES <div style="margin-top:-10px;height: 40px; width:100px;float:right;background: url('http://sites.uepg.br/prograd/wp-content/themes/PROGRAD/images/logo.fw.png') no-repeat;background-size: 70px 40px;"></div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>



                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>
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



    <?php if($e->vagas-$e->inscritos > 0 ): ?>
    <a href="<?php echo e(url('/login/'.$e->id)); ?>">
        <button class="btn btn-warning" type="button">
      Ir para o sistema para cadastrar <span class="badge"><?php echo e($e->vagas-$e->inscritos); ?> vagas restantes</span>
    </button>
    </a>
    <?php endif; ?>

    



</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>