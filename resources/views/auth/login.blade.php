@extends('layouts.app')
@section('content')

<div class="container">


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action=" @if(!isset($id)){{ url('/login/0') }} @else {{ url('/login/'.$id) }} @endif ">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input type="text" id="cpf"  name="cpf" class="form-control" maxlength="14" value="{{ old('cpf') }}"  required autofocus>
                                
                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->any())
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first() }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
 
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Manter logado
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Esqueceu sua senha?
                                </a>
                            </div>
                        </div>

                        



                                        



                    </form>
                </div>
                <div class="panel-footer">
                    
                    <center>Não tem cadastro?</center><br>
                    
                                <center><a href="{{ url('/register') }}">
                                    <img src="/img/button_clique-aqui-para-cadastrar.png">
                                </a></center>

                </div>
                
            </div>
        </div>
    </div>
    

</div>
@endsection
