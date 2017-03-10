@extends('layouts.public')

@section('content')
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
                    <a style=" width: 270px !important;" class="navbar-brand" href="http://localhost:8000">
                        Programa DES <div style="margin-top:-10px;height: 40px; width:100px;float:right;background: url('http://sites.uepg.br/prograd/wp-content/themes/PROGRAD/images/logo.fw.png') no-repeat;background-size: 70px 40px;"></div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>



                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>
<div class="container">
     <h2>{{$e->nome}}</h2>
    <span style="font-size: 12px;color grey">{{date("d",strtotime($e->data_evento))}} de  {{date("M",strtotime($e->data_evento))}} de {{date("Y",strtotime($e->data_evento))}}</span>

    <hr>
    @if($e->has_banner)
        <div class="row">
            <div class="col-md-5" >
                <p style="text-align: justify;"> {{$e->descricao}}</p>
            </div>
            <div class="col-md-7" >
                 <div class="col-md-12"  style="
                    
                    height:300px; width:600px;
                    background: url('{{ asset('assets/upload/imagens_eventos/'.$e->id.'.jpg')}} ');
                    background-size: 600px 300px;
                    background-repeat: no-repeat;
                  " class="col-md-12">
                    
                </div>
            </div>

        </div>

    @else
        <div >
                <p style="text-align: justify;"> {{$e->descricao}}</p>
            </div>
    @endif
    <hr>

    <h3>Detalhes do evento</h3>
    <ul>
        <li>
            <b>Data: </b>{{date("d",strtotime($e->data_evento))}} de  {{date("M",strtotime($e->data_evento))}} de {{date("Y",strtotime($e->data_evento))}}
        </li>
        <li>
            <b>Data final das inscrições: </b>{{date("d",strtotime($e->data_fim))}} de  {{date("M",strtotime($e->data_fim))}} de {{date("Y",strtotime($e->data_fim))}}
        </li>
        <li>
            <b>Local: </b>{{$e->local}}
        </li>
        <li>
            <b>Ministrante: </b>{{$e->palestrante}}
        </li>
        <li>
            <b>Carga Horária: </b>{{$e->cargaHoraria}}
        </li>
        <li>
            <b>Horário de início: </b>{{date("H:i",strtotime($e->horario_evento))}}
        </li>
        <li>
            <b>Público alvo: </b>@if($e->aluno) alunos | @endif @if($e->agente)agentes | @endif @if($e->comunidade)comunidade | @endif @if($e->professor)professores   @endif
        </li>
        <li>
            <b>Número de vagas: </b>{{$e->vagas}}
        </li>
    </ul>

    <hr>
    <h3>Mais sobre</h3>
    <p style="text-align: justify;">{!!$e->mais_sobre!!}</p>


    <hr>

    <span style="color:silver">{{$e->vagas-$e->inscritos}} vagas disponíveis</span>
    @if($e->vagas-$e->inscritos > 0 )
    <a href="{{url('/login/'.$e->id)}}"><button type="button" class="btn btn-warning">Entre na área de usuario para confirmar a participação</button></a>
    @endif

    



</div>


@endsection
