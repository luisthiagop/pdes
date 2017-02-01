
@extends('layouts.app')
@section('content')

<script type="text/javascript">
    $(document).ready( function() {
        $('#lieventos').addClass( 'active' );
        $('#lirelatorio').removeClass('active');
    } );
</script>
<div class="container" >
    @if (session('erro'))
                        <div class="alert alert-danger">
                            {{ session('erro') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
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
                            <label for="palestrante" class="col-md-4 control-label">Ministrante</label>
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
                                <input id="data_evento" type="date" class="form-control" name="data_evento" value="{{ old('data_evento') }}"  >
                                @if ($errors->has('data_evento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_evento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('horario_evento') ? ' has-error' : '' }}">
                            <label for="horario_evento" class="col-md-4 control-label">Horario</label>

                            <div class="col-md-3">
                                <input id="horario_evento" type="time" class="form-control" name="horario_evento" value="{{ old('horario_evento') }}" >

                                @if ($errors->has('horario_evento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('horario_evento') }}</strong>
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
                        
                            <div class="row">
                              
                               
                             
                                                        
                            @foreach($eventos as $evento)
                                <div  class="col-sm-6 col-md-4">
                                    <div style="height: 360px !important;" class="thumbnail">
                                        @if($evento->has_banner)
                                            <img src="{{asset('assets/upload/imagens_eventos/'.$evento->name_banner)}}" alt="...">
                                        @endif
                                        <div class="caption">
                                            <h3>{{$evento->nome}}</h3>
                                            
                                            <p><b>Carga Horária: </b>{{$evento->cargaHoraria}} @if($evento->cargaHoraria>1)horas @else hora @endif</p>
                                            <p><b>Data: </b>{{date('d/m/Y', strtotime($evento->data_evento))}}</p>
                                            <p><b>Inscrições até: </b>{{date('d/m/Y', strtotime($evento->data_fim))}}</p>
                                            <p><a href="{{url('user/evento/'.$evento->id)}}"><button type="button" class="btn btn-primary">Ver mais</button></a></p>
                                        </div>
                                    </div>
                                </div> 

                            @endforeach  
                             
                            </div>
                    @else 
                       
                        <div class="alert alert-info" style="margin-top: 15px;">
                            Não existem novos eventos 
                        </div>
                        
                        
                    
                        
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    @endif

                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


