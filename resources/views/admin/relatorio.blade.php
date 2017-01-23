@extends('layouts.app')

@section('content')
<div class="container container-fluid">
    <div class="row">
        @if (session('erro'))
            <div class="alert alert-danger">
                {{ session('erro') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {!!session('success')!!}
            </div>
        @endif
        
    </div>
    <h2>Relatório</h2>
    <div class="row-fluid">
        <div class="col-md-6 ">
            <p><b>Nome do evento:</b> {{$evento->nome}}</p> 
            <p><b>Ministrante</b> {{$evento->palestrante}}</p> 
            <p><b>Carga horária:</b> {{$evento->cargaHoraria}}</p> 
            <p><b>Número de vagas:</b> {{$evento->vagas}}</p> 
            <p><b>Número de inscritos:</b> {{$evento->inscritos}}</p>


        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-6 pull-right">
        <p><b>Data:</b> {{date('d/m/Y', strtotime($evento->data_evento))}}</p> 
        <!---<p><b>Descrição</b> {!!$evento->descricao!!}</p>----> 
        


        </div>
    </div>

    @if(count($users)!=0)
    <div class="row">
        <div class="col-md-12 ">    
                
            <div class="panel panel-default ">
                <div class="panel-heading"><h4>Lista de participantes</h4></div>
                <table class="table table-striped ">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Tipo</th>
                            <th>Curso</th>
                            <th>Instituição</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><b>{{$user->name}}</b></td>
                                    <td>{{$user->cpf}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->fone}}</td>
                                    <td>{{$user->tipo}}</td>
                                    <td>{{$user->curso}}</td>
                                    <td>{{$user->instituicao}}</td>
                                </tr>
                            @endforeach 
                        </tbody>
                </table>                
            
            </div>
        </div>
        <a href="{{url('admin/eventos/relatorio/export/'.$evento->id)}}"<button type="button" class="btn btn-primary">Gerar lista de presença</button></a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Adicionar por CPF</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Adicionar usuário por CPF</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/eventos/register_by_cpf') }}">
                            {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$evento->id}}">

                                <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                                    <label for="cpf" class="col-md-4 control-label">CPF</label>

                                    <div class="col-md-6">
                                        <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}"  autofocus>

                                        @if ($errors->has('cpf'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cpf') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Adicionar participante</button>
                                </div>

                            </form>
                        </div>
                        
                    </div>
              </div>
        </div>


    </div>
    

    @endif


      

</div>
    @if(count($users)==0)
    <div class="container container-fluid">
        <div class="alert alert-info">
          Ainda ninguém se cadastrou para esse evento!
        </div>
    </div>
    @endif
@endsection


