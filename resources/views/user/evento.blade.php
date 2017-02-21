@extends('layouts.app')

@section('content')
@if(count($evento)==0)
    <div class="container">        
        <div class="alert alert-info">
          <strong></strong> Evento não disponível.
        </div>
    </div>

@else


<script>
  function onSubmit(token) {
    alert('thanks ' + document.getElementById('field').value);
  }

  function validate(event) {
    event.preventDefault();
    if (!document.getElementById('field').value) {
      alert("You must add text to the required field");
    } else {
      grecaptcha.execute();
    }
  }

  function onload() {
    var element = document.getElementById('submit');
    element.onclick = validate;
  }
</script>

<div class="container">
    
    <div class="row">
        <div class="col-md-7"> 
         @if($evento->has_banner)
            <div>
                <div class="col-md-12"  style="
                    
                    height:300px; width:600px;
                    background: url('{{ asset('assets/upload/imagens_eventos/'.$evento->id.'.jpg')}} ');
                    background-size: 600px 300px;
                    background-repeat: no-repeat;
                  " class="col-md-12">
                    
                </div>
                <br>
            </div>
            @endif
        </div>
        @if($evento->data_evento>date('Y-m-d') || ($evento->data_evento==date('Y-m-d')&& $evento->horario_evento>date('H:i:s')))
        <div class="col-md-5">
            
            @if(!count($participa) && Auth::user())
                <form id="form-actions"  method="POST" action="{{ url('user/evento/participar/') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$evento->id}}">
                    
                    <input type="submit" class="btn btn-success" value="Participar">
                    
                   
                


                </form>
            @elseif(count($participa) && Auth::user())
                <form id="form-actions" method="POST" action="{{ url('user/evento/sair/') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$evento->id}}">
                    
                    <input type="submit" class="btn btn-danger" value="Cancelar participação" >
                    
                    
                </form>

            @endif

        
        </div>
    @endif
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1>{{$evento->nome}}</h1>
            <p><b>Descrição: </b>{!!$evento->descricao!!}</p>
            <p><b>Mais: </b>{!!$evento->mais_sobre!!}</p>
            <p><b>Ministrante: </b>{{$evento->palestrante}}</p>
            <p><b>Carga Horaria:</b> {{$evento->cargaHoraria}} @if($evento->cargaHoraria != 1)horas @else hora @endif</p>
            <p><b>Data do Evento: </b>{{date('d/m/Y', strtotime($evento->data_evento))}} <b>Horario do Evento: </b>{{$evento->horario_evento}}</p>
            <p><b>Início  das inscrições: </b>{{date('d/m/Y', strtotime($evento->data_inicio))}} - <b>Fim  das inscrições: </b>{{date('d/m/Y', strtotime($evento->data_fim))}}</p>
            <p><b>Vagas disponíveis: </b>{{$evento->vagas-$evento->inscritos}}</p>
        </div>

        
        </div>


       
    </div>
</div>

<script>
    onload();
</script>



        @endif



@endsection
