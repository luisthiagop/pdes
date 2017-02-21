
@extends('layouts.app')
@section('content')

<script type="text/javascript">
    $(document).ready( function() {
        $('#lieventos').addClass( 'active' );
        $('#lirelatorio').removeClass('active');
    } );
</script>
<style type="text/css">
    .profile-card {
    background-color: #666;
  margin-bottom: 20px;
            
        }
        
.profile-pic {
  border-radius: 50%;
  position: absolute;
  top: -65px;
  left: 0;
  right: 0;
  margin: auto;
  z-index: 1;
  max-width: 100px;
  -webkit-transition: all 0.4s;
          transition: all 0.4s;
                }

                
.profile-info {
        color: #BDBDBD;
        padding: 25px;
        position: relative;
        margin-top: 15px;
                }
        
.profile-info h2 {
    color: #E8E8E8;
    letter-spacing: 4px;
      padding-bottom: 12px;
                }
                
.profile-info span {
    display: block;
    font-size: 12px;
    color: #4CB493;
    letter-spacing: 2px;
            }

.profile-info a {
     color: #4CB493;
        }
.profile-info i {
        padding: 15px 35px 0px 35px;
        }
        

.profile-card:hover .profile-pic {
    
    transform: scale(1.1);
        }

.profile-card:hover .profile-info hr  {
    opacity: 1;
        }
        
        
        
        
/* Underline From Center */
.hvr-underline-from-center {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
  position: relative;
  overflow: hidden;
}
.hvr-underline-from-center:before {
  content: "";
  position: absolute;
  z-index: -1;
  left: 52%;
  right: 52%;
  bottom: 0;
  background: #FFFFFF;
  border-radius: 50%;
  height: 3px;
  -webkit-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.profile-card:hover .hvr-underline-from-center:before, .profile-card:focus .hvr-underline-from-center:before, .profile-card:active .hvr-underline-from-center:before {
  left: 0;
  right: 0;
  height: 1px;
  background: #CECECE;
}

</style>
<div class="container" >
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Próximos eventos</a></li>
            <li><a data-toggle="tab" href="#menu1">Eventos passados</a></li>
            <li><a data-toggle="tab" href="#menu2">Eventos cadastrados</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Próximos eventos</h3>
                @if(count($eventos)!=0)
                        @foreach($eventos as $e)                            
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="profile-card text-center">
                                    <img class="img-responsive" src="@if($e->has_banner){{asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')}} @else {{asset('assets/upload/imagens_eventos/no-banner.jpg')}} @endif ">
                                    
                                    <div class="profile-info">
                                        <img class="profile-pic" src="">
                                        <h2 class="hvr-underline-from-center">{{$e->nome}}<span>Data: {{date("d/m",strtotime($e->data_evento))}}</span>
                                        <span>Horário: {{date("h:i",strtotime($e->horario_evento))}}</span>
                                        </h2>
                                        <p style="white-space: break-word; width: 300px; overflow: hidden;text-overflow: ellipsis; ">
                                          {{$e->descricao}}
                                        </p>
                                        <p>
                                          <b>Ministrante: </b> {{$e->palestrante}}
                                        </p>
                                        
                                        <a href="{{url('user/evento/'.$e->id)}}"><button class="btn btn-default btn-xs">ler mais</button></a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        <div class="row">
                          {{ $eventos->links() }}
                        </div>
                @else
                    <div class="alert alert-info" style="margin-top: 15px;">
                        Não existe nenhum evento que você possa se cadastrar!
                    </div>

                @endif

            </div>





            <div id="menu1" class="tab-pane fade">
                <h3>Eventos passados</h3>
                
                @if(count($eventos_passados)!=0)
                    <div class="row">
                                                   
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
                                <th>Veja como foi</th>                                
                            </tr>

                            @foreach($eventos_passados as $e)
                                
                                <tr>
                                    <td><a  href="{{url('user/evento/'.$e->id)}}">{{$e->nome}}</a></td>
                                    <td>{{$e->palestrante}}</td>
                                    <td>{{$e->cargaHoraria}} horas</td>
                                    <td>{{date('d/m/Y', strtotime($e->data_evento))}}</td>
                                    <td>{{date('d/m/Y', strtotime($e->data_inicio))}}</td>
                                    <td>{{date('d/m/Y', strtotime($e->data_fim))}}</td>
                                    <td><a target="_blank" href="{{$e->fb_link}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></td>

                                    
                                </tr>
                                

                            @endforeach 
                            <div class="row">{{$eventos->passados->links()}}</div> 

                            </table>
                        </div>

                    </div>
                @else
                    <div class="alert alert-info" style="margin-top: 15px;">
                        Não existe nenhum evento passado!
                    </div>

                @endif




            </div>





            <div id="menu2" class="tab-pane fade">
                <h3>Eventos cadastrados</h3>
                 @if(count($eventos_cadastrados)!=0)
                    <div class="row">
                                                   
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
                            </tr>

                            @foreach($eventos_cadastrados as $e)
                                
                                <tr>
                                    <td><a href="{{url('user/evento/'.$e->id)}}">{{$e->nome}}</a></td>
                                    <td>{{$e->palestrante}}</td>
                                    <td>{{$e->cargaHoraria}} horas</td>
                                    <td>{{date('d/m/Y', strtotime($e->data_evento))}}</td>
                                    <td>{{date('d/m/Y', strtotime($e->data_inicio))}}</td>
                                    <td>{{date('d/m/Y', strtotime($e->data_fim))}}</td>
                                    
                                    
                                </tr>
                                

                            @endforeach  
                             <div class="row">{{$eventos_cadastrados->links()}}</div> 

                            </table>
                        </div>

                    </div>
                @else
                    <div class="alert alert-info" style="margin-top: 15px;">
                        Você nunca participou de um evento!
                    </div>

                @endif




            </div>



        </div> 


    

</div>


@endsection


