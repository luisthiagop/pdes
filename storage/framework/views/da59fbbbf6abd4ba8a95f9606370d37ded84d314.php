<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'ProgramaDES')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(URL::asset('css/app.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(URL::asset('css/footer.css')); ?>" rel="stylesheet">



    <!-- Scripts -->

     <!-- Scripts -->
     <script src="https://use.fontawesome.com/2584949f14.js"></script>
    <script src="<?php echo e(URL::asset('/js/app.js')); ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.3/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
            $('#fone').mask('(00) 00000-0000');

        });
    </script>

    



   
   <style type="text/css" src="/css/app.css"></style>

<script src='https://www.google.com/recaptcha/api.js'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
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
                    <a style=" width: 270px !important;" class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?> <div style="margin-top:-10px;height: 40px; width:100px;float:right;background: url('http://sites.uepg.br/prograd/wp-content/themes/PROGRAD/images/logo.fw.png') no-repeat;background-size: 70px 40px;"></div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li><a href="<?php echo e(url('/admin')); ?>"><span class="badge">Início</span></a></li>
                    </ul>



                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <
                        <!-- Authentication Links -->

                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(url('/register')); ?>">Cadastro</a></li>
                        <?php else: ?>

                            <?php if(Auth::user()->admin): ?>
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            Usar como <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?php echo e(url('/admin/eventos')); ?>">
                                                    Administrador
                                                </a>

                                                <a href="<?php echo e(url('/user/eventos')); ?>">
                                                    Usuário
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                            <?php endif; ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
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
        </div>

        <?php echo $__env->yieldContent('content'); ?>

    </div>

<footer class="footer">
      <div style="float:" class="container">
        <p  class="text-muted">Desenvolvido por <a href="http://pitangui.uepg.br/nti/">NTI</a></p>
        
      </div>      
    </footer>  

</body>
</html>

