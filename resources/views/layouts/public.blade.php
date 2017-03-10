<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProgramaDES') }}</title>

    <!-- Styles -->
    <link href="{{URL::asset('css/public.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/footer.css')}}" rel="stylesheet">



    <!-- Scripts -->

     <!-- Scripts -->
     <script src="https://use.fontawesome.com/2584949f14.js"></script>
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
        
        

        <div class="container">
            <div class="row">
                @if (session('erro'))
                   <div class="alert alert-danger fade in alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                         {!! session('erro') !!}
                    </div>
                       
                    
                @endif
                @if (session('success'))
                    <div class="alert alert-success fade in alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                         {!! session('success') !!}
                    </div>
                       
                @endif
                
            </div>
        </div>

        @yield('content')

    </div>



</body>
</html>

