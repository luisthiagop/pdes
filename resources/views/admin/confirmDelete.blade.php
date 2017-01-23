@extends('layouts.app')

@section('content')
<div class="container">
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
    @if($evento)
    <div class="row">
        <div class="col-md-12 ">
            <h1>Deletar {{$evento->nome}}?</h1>
            <p><b>Descrição: </b>{!!$evento->descricao!!}</p>
            <p><b>Palestrante: </b>{{$evento->palestrante}}</p>
            <p><b>Carga Horaria:</b> {{$evento->cargaHoraria}} @if($evento->cargaHoraria != 1)horas @else hora @endif</p>
            <p><b>Data do Evento: </b>{{date('d/m/Y', strtotime($evento->data_evento))}}</p>
            <p><b>Início  das inscrições: </b>{{date('d/m/Y', strtotime($evento->data_inicio))}} - <b>Fim  das inscrições: </b>{{date('d/m/Y', strtotime($evento->data_fim))}}</p>
        </div>

        <form method="post" action="{{url('admin/eventos/deletar')}}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$evento->id}}">

            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-danger">
                    Deletar Evento
                </button>
            </div>


        </form>
    </div>
    @endif
</div>

@endsection
