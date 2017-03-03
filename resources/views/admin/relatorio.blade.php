@extends('layouts.app')

@section('content')

<script type="text/javascript">
    

    function atualiza(user_id){
        var name= '.id'+user_id;
        var cargaHoraria = $(name).val();
        $.ajax({
                url: "{{url('/admin/eventos/cargaHoraria')}}",
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id":user_id,
                    "evento_id":{{$evento->id}},
                    "horas":cargaHoraria,
                }
                
                
            });

        }

        function remover_usuario(id){
            if(confirm("Quer mesmo remover esse participante?")){
                $.ajax({
                  url: "{{url('/admin/eventos/removerParticipante')}}",
                  dataType: 'text',
                  type: 'post',
                  contentType: 'application/x-www-form-urlencoded',
                  data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id":id,
                        "evento_id":{{$evento->id}},
                  },
                  success: function(response){
                      window.location.reload();
                  },
                  errors: function(response){
                      alert('erro');
                  },
                  
                });
            }
        }


    
</script>
<div class="container container-fluid">
    
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Adicionar por CPF</button>
    <a href="{{url('admin/eventos/relatorio/export/'.$evento->id)}}"><button type="button" class="btn btn-primary">Gerar lista de presença</button></a>
    <a href="{{url('admin/eventos/relatorio/export/csv/'.$evento->id)}}"><button type="button" class="btn btn-success">Exportar csv</button></a>
    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#emailModal">Enviar e-mail </button>

    <div class="row">
        
    </div>
    <h2>Relatório</h2>
    <div class="row-fluid">
        <div class="col-md-6 ">
            <p><b>Nome do evento:</b> {{$evento->nome}}</p> 
            <p><b>Ministrante</b> {{$evento->palestrante}}</p> 
            <p><b>Carga horária:</b> {{$evento->cargaHoraria}}</p> 
            <p><b>Número de vagas:</b> {{$evento->vagas}}</p> 
            <p><b>Número de inscritos:</b> {{$evento->inscritos}}</p>


        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-6 pull-right">
        <p><b>Data:</b> {{date('d/m/Y', strtotime($evento->data_evento))}}</p> 
        <!---<p><b>Descrição</b> {!!$evento->descricao!!}</p>----> 
        



        </div>
    </div>

    @if(count($inscricoes)!=0)
    <div class="row">
        <div class="col-md-12 ">    
                
            <div class="panel panel-default ">
                <div class="panel-heading"><h4>Lista de participantes</h4></div>
                <table class="table table-striped ">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Tipo</th>
                            <th>Curso</th>
                            <th>Instituição</th>
                            <th>Horas</th>
                            <th>Remover</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($inscricoes as $user)
                                <tr>
                                    <td><b>{{$user->name}}</b></td>
                                    <td>{{$user->cpf}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->fone}}</td>
                                    <td>{{$user->tipo}}</td>
                                    <td>{{$user->curso}}</td>
                                    <td>{{$user->instituicao}}</td>
                                    <td>                                    
                                        <input  class="id{{$user->id}}" value="{{$user->horas}}" min="0" max="{{$evento->cargaHoraria}}" type="number" onblur="atualiza({{$user->id}});"  name="horas">
                                    
                                    


                                    </td>
                                    <td>
                                    <i style="cursor: pointer;" class="material-icons" onclick="remover_usuario({{$user->id}});">delete_forever</i>
                                       
                                            
                                        
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                </table>                
            
            </div>
        </div>
        

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Adicionar usuário por CPF</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/eventos/register_by_cpf') }}">
                            {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$evento->id}}">

                                <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                                    <label for="cpf" class="col-md-4 control-label">CPF</label>

                                    <div class="col-md-6">
                                        <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}"  autofocus>

                                        @if ($errors->has('cpf'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cpf') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Adicionar participante</button>
                                </div>

                            </form>
                        </div>
                        
                    </div>
              </div>
        </div>


    </div>
    

    @endif


      

 <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
  <div class="modal fade" id="emailModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enviar e-mail aos participantes do evento</h4>
        </div>
        <div class="modal-body">
            
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/eventos/relatorio/sendmail') }}">
            {{ csrf_field() }}
            <input type="hidden" name="evento_id" value="{{$evento->id}}">

            <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                <label for="mensagem" class="col-md-4 control-label">Mensagem</label>

                <div class="col-md-8">
                    <textarea class=" form-control" name="mensagem" rows="5" id="mensagem"></textarea>

                    @if ($errors->has('mensagem'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mensagem') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <span class="caracteres"></span>
       





            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Enviar</button>
            </div>
            </form>
      </div>
      
    </div>
  </div>
  
</div>

<script type="text/javascript">
    $(document).on("input", "#mensagem", function () {
        var limite = 1000;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        $(".caracteres").text(caracteresRestantes+ 'restantes');
    });

</script>

</div>
    @if(count($inscricoes)==0)
    <div class="container container-fluid">
        <div class="alert alert-info">
          Ainda ninguém se cadastrou para esse evento!
        </div>
    </div>
    @endif
@endsection



