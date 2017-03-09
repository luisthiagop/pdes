@extends('layouts.public')

@section('content')

<div class="container">
    <h2>{{$e->nome}}</h2>
    <span style="font-size: 12px;color grey">{{date("d",strtotime($e->data_evento))}} de  {{date("M",strtotime($e->data_evento))}} de {{date("Y",strtotime($e->data_evento))}}</span>

    <hr>
        <p style="text-align: justify;"> {{$e->descricao}}</p>
    <hr>

    <h3>Detalhes do evento</h3>
    <ul>
        <li>
            <b>Data: </b>{{date("d",strtotime($e->data_evento))}} de  {{date("M",strtotime($e->data_evento))}} de {{date("Y",strtotime($e->data_evento))}}
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
    </ul>

    <hr>
    <h3>Mais sobre</h3>
    {!!$e->mais_sobre!!}


</div>


@endsection
