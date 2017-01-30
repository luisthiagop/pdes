<?php $__env->startSection('content'); ?>


<script>



function fcurso() {
    document.getElementById('instituicao').removeAttribute('disabled');
    document.getElementById('curso').removeAttribute('disabled');

    if(document.getElementById("tipo").value == "comunidade"){
        
        document.getElementById('curso').setAttribute('disabled', 'disabled');
        document.getElementById('instituicao').setAttribute('disabled', 'disabled');

    }else if(document.getElementById("tipo").value == "agente"){
        

        document.getElementById('curso').setAttribute('disabled', 'disabled');

    }
     
}

</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"  autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" >

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="col-md-4 form-control" name="password" value="" >

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="col-md-4 form-control" name="password_confirmation" value="" >
                            </div>
                        </div>



                        <hr>


                        <div class="form-group<?php echo e($errors->has('cpf') ? ' has-error' : ''); ?>">
                            <label for="cpf" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input type="text" id="cpf"  name="cpf" class="form-control" maxlength="14" value="<?php echo e(old('cpf')); ?>">
                                
                                <?php if($errors->has('cpf')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('cpf')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>



                        
                        <div class="form-group<?php echo e($errors->has('fone') ? ' has-error' : ''); ?>">
                            <label for="fone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="fone" maxlength="15" minlength="14" type="tel" class="form-control" name="fone" value="<?php echo e(old('fone')); ?>" >

                                <?php if($errors->has('fone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('fone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        


                        <div class="form-group<?php echo e($errors->has('sexo') ? ' has-error' : ''); ?>">
                            <label for="sexo" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-2">
                                <select class="form-control" name="sexo" id="sexo" value="<?php echo e(old('sexo')); ?>">
                                    <option></option>
                                    <option <?php if(old('sexo')=='F'): ?> selected <?php endif; ?> value="F">Feminino</option>
                                    <option <?php if(old('sexo')=='M'): ?> selected <?php endif; ?> value="M">Masculino</option>
                                </select>

                                <?php if($errors->has('sexo')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('sexo')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>




                        <hr>

                        <div class="form-group<?php echo e($errors->has('tipo') ? ' has-error' : ''); ?>">
                            <label for="tipo" class="col-md-4 control-label">Tipo de Pessoa</label>

                            <div class="col-md-3">
                                <select onchange="fcurso();" class="form-control" name="tipo" id="tipo" value="<?php echo e(old('tipo')); ?>">
                                    <option></option>
                                    <option  value="agente">Agente</option>
                                    <option  value="aluno">Aluno</option>
                                    <option  value="comunidade">Comunidade</option>
                                    <option  value="professor">Professor</option>



                                </select>

                                <?php if($errors->has('tipo')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tipo')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group<?php echo e($errors->has('instituicao') ? ' has-error' : ''); ?>">
                            <label for="instituicao" class="col-md-4 control-label">Instituicao</label>

                            <div class="col-md-6">
                                <input id="instituicao"  class="form-control" name="instituicao" value="<?php echo e(old('instituicao')); ?>" >


                                <?php if($errors->has('instituicao')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('instituicao')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>




                        <div class="form-group<?php echo e($errors->has('curso') ? ' has-error' : ''); ?>">
                            <label for="curso" class="col-md-4 control-label">Curso</label>

                            <div class="col-md-6">
                                <input  id="curso"  class="form-control" name="curso" value="<?php echo e(old('curso')); ?>" >


                                <?php if($errors->has('curso')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('curso')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
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