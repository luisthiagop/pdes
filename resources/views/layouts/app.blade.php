<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/footer.css')}}" rel="stylesheet">



    <!-- Scripts -->

     <!-- Scripts -->
    <script src="{{URL::asset('/js/app.js')}}"></script>
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
                    <a style=" width: 270px !important;" class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }} <div style="margin-top:-10px;height: 40px; width:100px;float:right;background: url('http://sites.uepg.br/prograd/wp-content/themes/PROGRAD/images/logo.fw.png') no-repeat;background-size: 70px 40px;"></div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Cadastro</a></li>
                        @else
                            @if(Auth::user()->admin)
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            Usar como <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{url('/admin/eventos')}}">
                                                    Administrador
                                                </a>

                                                <a href="{{url('/user/eventos')}}">
                                                    Usuário
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

<footer class="footer">
      <div style="float:" class="container">
        <p  class="text-muted">Desenvolvido por <a href="http://pitangui.uepg.br/nti/">NTI</a></p>
        
      </div>      
    </footer>  

</body>
</html>
