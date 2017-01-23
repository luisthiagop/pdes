@extends('layouts.app')

@section('content')


<script type="text/javascript">
    $(document).ready( function() {
        $('#lieventos').addClass( 'active' );
        $('#lirelatorio').removeClass('active');
    } );
</script>
<div class="container" >
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
    <div class="row">
        <div class="col-md-12 ">

                <div class="panel-body  col-md-12">

                    
                        
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Novo evento</button>
                        
                


                    <div class="modal fade " id="myModal" role="dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content col-md-10 col-md-push-1">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Novo Evento</h4>
                          </div>
                          <div class="modal-body">
                            
                          <div class="row">
                          
                    <div class="col-md-12">
           
                
            
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/eventos/register') }}">
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

                            <div class="col-md-8">
                                <textarea class="textarea form-control" name="descricao" rows="5" id="descricao">{!!old('descricao')!!}</textarea>

                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('cargaHoraria') ? ' has-error' : '' }}">
                            <label for="vagas" class="col-md-4 control-label">Número de vagas</label>

                            <div class="col-md-2">
                                <input id="vagas" type="number" class="form-control" value="{{old('vagas')}}" name="vagas" > 

                                @if ($errors->has('vagas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vagas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      



                        <div class="form-group{{ $errors->has('cargaHoraria') ? ' has-error' : '' }}">
                            <label for="cargaHoraria" class="col-md-4 control-label">Carga Horaria</label>

                            <div class="col-md-2">
                                <input id="cargaHoraria" type="number" value="{{old('cargaHoraria')}}" class="form-control" name="cargaHoraria" > 

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
                                <input id="data_evento" type="date" class="form-control" name="data_evento" value="{{ old('data_evento') }}" min="{{date('Y-m-d')}}" >

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
                                <input id="data_inicio" type="date" class="form-control" name="data_inicio" value="{{ old('data_inicio') }}" min="{{date('Y-m-d')}}"  >

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
                                <input id="data_fim" type="date" class="form-control" name="data_fim" value="{{ old('data_fim') }}" min="{{date('Y-m-d')}}"  >

                                @if ($errors->has('data_fim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_fim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                            <label for="banner" class="col-md-4 control-label">Banner</label>

                            <div class="col-md-3">
                                <input type="file" name="banner">
                            </div>
                        </div>


                        
       




                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar evento
                                </button>
                            </div>
                        </div>
                    </form>










                          </div>
                          
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          
                        </div>
                        
                      </div>
                    </div>
                </div>



                    @if (count($hoje)!==0)

                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading" ><b style="color:green">Eventos Hoje</b></div>

                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Ministrante</th>
                                <th>Carga Horaria</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                                <th>Relatório</th>
                            </tr>

                            @foreach($hoje as $evento)
                                
                                <tr>
                                    <td><a href="{{url('user/evento/'.$evento->id)}}">{{$evento->nome}}</a></td>
                                    <td>{{$evento->palestrante}}</td>
                                    <td>{{$evento->cargaHoraria}} horas</td>
                                    <td><a href="{{url('/admin/evento/'.$evento->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></a></span></td>
                                    <td><a href="{{url('admin/eventos/delete/'.$evento->id)}}"><span style="color:red" style="color:red" class="glyphicon glyphicon-minus" aria-hidden="true"></span></a></td>
                                    <td><a href="{{url('admin/eventos/relatorio/'.$evento->id)}}"><span style="color:green" class=" glyphicon glyphicon-ok-circle" aria-hidden="true"></span></a></td>
                                   
                                </tr>
                                

                            @endforeach  

                            </table>
                        </div>

                             
                    @endif

                    <hr>

                    @if (count($atuais)!==0)

                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading"><b style="color:#36f">Inscrições abertas</b></div>

                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Ministrante</th>
                                <th>Carga Horaria</th>
                                <th>Data</th>
                                <th>Início das inscrições</th>
                                <th>Fim das inscrições</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                                <th>Relatório</th>
                            </tr>

                            @foreach($atuais as $evento)
                                
                                <tr>
                                    <td><a href="{{url('user/evento/'.$evento->id)}}">{{$evento->nome}}</a></td>
                                    <td>{{$evento->palestrante}}</td>
                                    <td>{{$evento->cargaHoraria}} horas</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_evento))}}</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_inicio))}}</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_fim))}}</td>
                                    <td><a href="{{url('/admin/evento/'.$evento->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></a></span></td>
                                    <td><a href="{{url('admin/eventos/delete/'.$evento->id)}}"><span style="color:red" style="color:red" class="glyphicon glyphicon-minus" aria-hidden="true"></a></span></td>
                                    <td><a href="{{url('admin/eventos/relatorio/'.$evento->id)}}"><span style="color:green" class=" glyphicon glyphicon-ok-circle" aria-hidden="true"></span></a></td>
                                </tr>
                                

                            @endforeach  

                            </table>
                        </div>

                             
                    @endif

                    <hr>
                    @if (count($futuros)!==0)
                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading"><b style="color:orange">Inscrições futuras</b></div>

                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Ministrante</th>
                                <th>Carga Horaria</th>
                                <th>Data</th>
                                <th>Início das inscrições</th>
                                <th>Fim das inscrições</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                                <th>Relatório</th>
                            </tr>

                            @foreach($futuros as $evento)
                                
                                <tr>
                                    <td><a href="{{url('user/evento/'.$evento->id)}}">{{$evento->nome}}</a></td>
                                    <td>{{$evento->palestrante}}</td>
                                    <td>{{$evento->cargaHoraria}} horas</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_evento))}}</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_inicio))}}</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_fim))}}</td>
                                    <td><a href="{{url('/admin/evento/'.$evento->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></a></span></td>
                                    <td><a href="{{url('admin/eventos/delete/'.$evento->id)}}"><span style="color:red" style="color:red" class="glyphicon glyphicon-minus" aria-hidden="true"></a></span></td>
                                    <td><a href="{{url('admin/eventos/relatorio/'.$evento->id)}}"><span style="color:green" class=" glyphicon glyphicon-ok-circle" aria-hidden="true"></span></a></td>
                                </tr>
                                

                            @endforeach  

                            </table>
                        </div>
                        <hr>
                        @endif 
                        @if(count($passados)!==0)
                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading"><b style="color:grey">Eventos passados</b></div>

                    
                            <table class="table table-bordered">
                            <tr>
                                <th>Evento</th>
                                <th>Ministrante</th>
                                <th>Carga Horaria</th>
                                <th>Data</th>
                                <th>Início das inscrições</th>
                                <th>Fim das inscrições</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                                <th>Relatório</th>
                            </tr>

                            @foreach($passados as $evento)
                                
                                <tr>
                                    <td><a href="{{url('user/evento/'.$evento->id)}}">{{$evento->nome}}</a></td>
                                    <td>{{$evento->palestrante}}</td>
                                    <td>{{$evento->cargaHoraria}} horas</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_evento))}}</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_inicio))}}</td>
                                    <td>{{date('d/m/Y', strtotime($evento->data_fim))}}</td>
                                    <td><a href="{{url('/admin/evento/'.$evento->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></a></span></td>
                                    <td><a href="{{url('admin/eventos/delete/'.$evento->id)}}"><span style="color:red" style="color:red" class="glyphicon glyphicon-minus" aria-hidden="true"></a></span></td>
                                    <td><a href="{{url('admin/eventos/relatorio/'.$evento->id)}}"><span style="color:green" class=" glyphicon glyphicon-ok-circle" aria-hidden="true"></span></a></td>
                                </tr>
                                

                            @endforeach  

                            </table>
                        </div>

                    
                        
                    <hr>

                    @endif
                    @if(count($passados)==0&&count($hoje)==0&&count($futuros)==0&&count($atuais)==0)

                        <div class="alert alert-info">
                          Não existem eventos cadastrados atualmente!
                        </div>

                        
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    //$('textarea').ckeditor();
    $('.textarea').ckeditor(); // if class is prefered.
</script>
@endsection
