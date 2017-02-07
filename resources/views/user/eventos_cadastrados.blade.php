

@extends('layouts.app')
@section('content')
  
<script type="text/javascript">
    $(document).ready( function() {
        $('#lieventosc').addClass( 'active' );
        $('#lieventos').removeClass('active');
    } );
</script>
<div class="container" >
    <div class="row">
        <div class="col-md-12 ">
        
                @include('user.nav')
                <div class="panel-body  col-md-10">
                    
      
                
                    <div class="modal fade " id="myModal" role="dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content col-md-8 col-md-push-2">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Novo Evento</h4>
                          </div>
                          <div class="modal-body">
                            
                          <div class="row">
                          
                    <div class="col-md-12">
           
                
            
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/eventos/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}"  autofocus>
                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                            <label for="descricao" class="col-md-4 control-label">Descrição</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="descricao" rows="5" id="descricao"></textarea>
                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cargaHoraria') ? ' has-error' : '' }}">
                            <label for="cargaHoraria" class="col-md-4 control-label">Carga Horaria</label>
                            <div class="col-md-2">
                                <input id="cargaHoraria" type="number" class="form-control" name="cargaHoraria" > 
                                @if ($errors->has('cargaHoraria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cargaHoraria') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      
                   
                        <div class="form-group{{ $errors->has('palestrante') ? ' has-error' : '' }}">
                            <label for="palestrante" class="col-md-4 control-label">Palestrante</label>
                            <div class="col-md-6">
                                <input id="palestrante" class="form-control" name="palestrante" value="{{ old('palestrante') }}" >
                                @if ($errors->has('palestrante'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('palestrante') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('data_evento') ? ' has-error' : '' }}">
                            <label for="data_evento" class="col-md-4 control-label">Data do evento</label>
                            <div class="col-md-3">
                                <input id="data_evento" type="date" class="form-control" name="data_evento" value="{{ old('data_evento') }}" >
                                @if ($errors->has('data_evento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_evento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('data_inicio') ? ' has-error' : '' }}">
                            <label for="data_inicio" class="col-md-4 control-label">Data do início das inscrições</label>
                            <div class="col-md-3">
                                <input id="data_inicio" type="date" class="form-control" name="data_inicio" value="{{ old('data_inicio') }}" >
                                @if ($errors->has('data_inicio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_inicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('data_fim') ? ' has-error' : '' }}">
                            <label for="data_fim" class="col-md-4 control-label">Data final das inscrições</label>
                            <div class="col-md-3">
                                <input id="data_fim" type="date" class="form-control" name="data_fim" value="{{ old('data_fim') }}" >
                                @if ($errors->has('data_fim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_fim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
                          </div>
                          
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          
                        </div>
                        
                      </div>
                    </div>
                    @if (count($eventos)!==0)
                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading">Lista de eventos cadastrados</div>
                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Palestrante</th>
                                <th>Carga Horaria</th>
                                <th>Data</th>
                                <th>Início das inscrições</th>
                                <th>Fim das inscrições</th>
                                
                            </tr>
                            
                            @foreach($eventos as $evento)
                                
                                <tr>
                                    <td><a href="{{url('user/evento/'.$evento->id)}}">{{$evento->nome}}</a></td>
                                    <td>{{$evento->palestrante}}</td>
                                    <td>{{$evento->cargaHoraria}} horas</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_evento))}}</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_inicio))}}</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_fim))}}</td>
                                    
                                </tr>
                                
                            @endforeach  
                            </table>
                        </div>
                    @else 
                       
                        <div class="alert alert-info" style="margin-top: 15px;">
                            Você não está em nenhum evento!
                        </div>
                        
                    @endif
                    
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection