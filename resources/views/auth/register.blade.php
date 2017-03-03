@extends('layouts.app')

@section('content')


<script>



function fcurso() {
    document.getElementById('instituicao').removeAttribute('disabled');
    document.getElementById('curso').removeAttribute('disabled');

    if(document.getElementById("tipo").value == "agente"){        

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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="col-md-4 form-control" name="password" value="" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="col-md-4 form-control" name="password_confirmation" value="" >
                            </div>
                        </div>



                        <hr>


                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label for="cpf" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input type="text" id="cpf"  name="cpf" class="form-control" maxlength="14" value="{{ old('cpf') }}">
                                
                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        
                        <div class="form-group{{ $errors->has('fone') ? ' has-error' : '' }}">
                            <label for="fone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="fone" maxlength="15" minlength="14" type="tel" class="form-control" name="fone" value="{{ old('fone') }}" >

                                @if ($errors->has('fone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        


                        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <label for="sexo" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-2">
                                <select class="form-control" name="sexo" id="sexo" value="{{ old('sexo') }}">
                                    <option></option>
                                    <option @if(old('sexo')=='F') selected @endif value="F">Feminino</option>
                                    <option @if(old('sexo')=='M') selected @endif value="M">Masculino</option>
                                </select>

                                @if ($errors->has('sexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <hr>

                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="tipo" class="col-md-4 control-label">Categoria</label>

                            <div class="col-md-3">
                                <select onchange="fcurso();" class="form-control" name="tipo" id="tipo" value="{{ old('tipo') }}">
                                    <option></option>
                                    <option  value="agente">Agente</option>
                                    <option  value="aluno">Aluno</option>
                                    <option  value="comunidade">Comunidade</option>
                                    <option  value="professor">Professor</option>



                                </select>

                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('instituicao') ? ' has-error' : '' }}">
                            <label for="instituicao" class="col-md-4 control-label">Instituição</label>

                            <div class="col-md-6">
                                <input id="instituicao"  class="form-control" name="instituicao" value="{{ old('instituicao') }}" >


                                @if ($errors->has('instituicao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instituicao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('curso') ? ' has-error' : '' }}">
                            <label for="curso" class="col-md-4 control-label">Curso</label>

                            <div class="col-md-6">
                                <input  id="curso"  class="form-control" name="curso" value="{{ old('curso') }}" >


                                @if ($errors->has('curso'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('curso') }}</strong>
                                    </span>
                                @endif
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
@endsection
