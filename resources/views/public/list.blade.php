@extends('layouts.public')

@section('content')



<div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Inscrições abertas</a></li>
      <li><a data-toggle="tab" href="#menu1">Eventos Futuros</a></li>
      <li><a data-toggle="tab" href="#menu2">Eventos passados</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h2>Inscrições abertas</h2>

        <hr>
        @foreach($eventos_atuais as $e)
            <div class="">
                <h3>
                    <a target="_blank" href="{{url('verify/'.$e->id)}}">                        
                          {{$e->nome}}                    
                    </a>
                    <span style="font-size:12px;background: #27b6f7;">{{date("d/m/Y",strtotime($e->data_inicio))}}</span>

                </h3>

                
                
                

                
                <span class="eo-eb-event-meta"></span>
                
            </div>

            @if($e->has_banner) 
            <div>
                <a target="_blank" href="">
                    <img width="370" height="200" src="{{ asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')}} " alt="" srcset="" sizes="(max-width: 470px) 100vw, 170px">
                </a>
            </div>
            @endif
                    
            <p align="justify">{!! $e->descricao!!}</p>

            <p align="justify">
                <b>Ministrante:</b> {{$e->palestrante}}<br>
                <b>Local:</b> {!! $e->local !!}<br>
                <b>Horário:</b> {{date("H:i",strtotime($e->horario_evento))}}
            </p>
            <a target="_blank" href="{{url('verify/'.$e->id)}}">
                <button class="btn btn-sm btn-info">Ver mais</button>
            </a>

            

            
     
                

            <hr>

        @endforeach
        {{ $eventos_atuais->links() }}

        @if(!count($eventos_atuais))<p>Não existem eventos atuais.</p>@endif
      </div>
      <div id="menu1" class="tab-pane fade">
        <h2>Eventos anunciados</h2>

                <hr>
                @foreach($eventos_futuros as $e)
                    <div class="">
                        <h3>
                            <a target="_blank" href="{{url('verify/'.$e->id)}}">                      
                                  {{$e->nome}}                    
                            </a>
                            <span style="font-size:12px;background: #27b6f7;">{{date("d/m/Y",strtotime($e->data_inicio))}}</span>

                        </h3>

                        
                        
                        

                        
                        <span class="eo-eb-event-meta"></span>
                        
                    </div>

                    @if($e->has_banner) 
                    <div>
                        <a target="_blank" href="">
                            <img width="370" height="200" src="{{ asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')}} " alt="" srcset="" sizes="(max-width: 470px) 100vw, 170px">
                        </a>
                    </div>
                    @endif
                            
                    <p align="justify">{!! $e->descricao!!}</p>

                    <p align="justify">
                        <b>Ministrante:</b> {{$e->palestrante}}
                        <b>Local:</b> {!! $e->local !!}<br>
                        <b>Horário:</b> {{date("H:i",strtotime($e->horario_evento))}}
                    </p>
                    <a target="_blank" href="{{url('verify/'.$e->id)}}">
                        <button class="btn btn-sm btn-info">Ver mais</button>
                    </a>
                            
                    

                    
             
                        

                    <hr>

                @endforeach

                {{ $eventos_futuros->links() }}

                @if(!count($eventos_futuros))<p>Não existem eventos futuros.</p>@endif
      </div>
      <div id="menu2" class="tab-pane fade">
        <h2>Eventos passados</h2>

        <hr>
        @foreach($eventos_passados as $e)
            <div class="">
                <h3>
                    <a target="_blank" href="{{url('verify/'.$e->id)}}">                        
                          {{$e->nome}}                    
                    </a>
                    <span style="font-size:12px;background: #27b6f7;">{{date("d/m/Y",strtotime($e->data_inicio))}}</span>

                </h3>

                
                
                

                
                <span class="eo-eb-event-meta"></span>
                
            </div>

            @if($e->has_banner) 
            <div>
                <a target="_blank" href="">
                    <img width="370" height="200" src="{{ asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')}} " alt="" srcset="" sizes="(max-width: 470px) 100vw, 170px">
                </a>
            </div>
            @endif
                    
            <p align="justify">{!! $e->descricao!!}</p>

            <p align="justify">
                Ministrante: {{$e->palestrante}}
                Local: {!! $e->local !!}<br>
                Horário: {{date("H:i",strtotime($e->horario_evento))}}
            </p>
            @if($e->fb_link != "http://")
            <a target="_blank" href="{{$e->fb_link}}"> 
                <button class="btn btn-sm btn-info"> <i class="fa fa-facebook" aria-hidden="true"></i>
</button>
            </a>
            @endif           
            

            <a target="_blank" href="{{url('verify/'.$e->id)}}">
                <button class="btn btn-sm btn-info">Ver mais</button>
            </a>
                    
            

            
        
                

            <hr>

        @endforeach
        {{ $eventos_passados->links() }}

        @if(!count($eventos_passados))<p>Não existem eventos passados.</p>@endif
      </div>
    </div>



</div>
@endsection
