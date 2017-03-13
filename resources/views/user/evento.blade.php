@extends('layouts.app')

@section('content')
@if(count($e)==0)
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

    

        
        


    
    @if($e->data_evento>date('Y-m-d') || ($e->data_evento==date('Y-m-d')&& $e->horario_evento>date('H:i:s')))
   

    <div class="col-md-5">
            
            @if(!count($participa) && Auth::user() && $e->vagas-$e->inscritos > 0)
                <form id="form-actions"  method="POST" action="{{ url('user/evento/participar/') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$e->id}}">
                    
                    <button type="submit" class="btn btn-success" value="Participar">
                        Participar <span class="badge"> {{$e->vagas-$e->inscritos}} vagas disponíveis</span>
                    </button>
                    
                   
                


                </form>
            @elseif(count($participa) && Auth::user())
                <form id="form-actions" method="POST" action="{{ url('user/evento/sair/') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$e->id}}">
                    
                    <button type="submit" class="btn btn-danger" value="Cancelar participação" >
                    Cancelar participação <span class="badge"> {{$e->vagas-$e->inscritos}} vagas restantes</span>
                    </button>
                    
                    
                </form>

            @endif

        
    </div>
    @endif
    @endif

    



</div>

<script>
    onload();
</script>






@endsection
