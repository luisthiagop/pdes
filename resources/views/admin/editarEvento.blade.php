@extends('layouts.app')

@section('content')
    
    
<script type="text/javascript">
    function cbOnOff(){
       
        if($('#check1').prop('checked')) {
            $.ajax({
                url: "{{url('/admin/eventos/reativarEvento')}}",
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":id,
                },
                ////////////////arrumar essa parte -- errors para quando não for possivel ativar o evento
                success: function(response){

                    alert('Esse evento foi ativado novamente!');
                },
                errors: function(response){
                    alert('Esse evento não pode ser reativado');
                }
                
            });
            



        } else {
            
            $.ajax({
                url: "{{url('/admin/eventos/finalizarEvento')}}",
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":id,
                },
                success: function(response){
                    alert('Esse evento foi finalizado, você pode ativa-lo novamente antes da data do evento');
                },
                errors: function(response){
                    alert('Esse evento não pode ser finalizado');
                }
                
            });

        }

    }

</script>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Editar evento</div>

                <div class="panel-body">

                   

                     <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('admin/eventos/update') }}">
                        {{ csrf_field() }}


                        <!---<input id="check1" type="checkbox" onchange="cbOnOff();"  @if($evento->status)checked @endif data-toggle="toggle">---->

                        
                        <input type="hidden" name="id" value="{{$evento->id}}">





                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ $evento->nome }}"  autofocus>

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
                                <textarea class=" form-control" name="descricao" rows="5" id="descricao">{{$evento->descricao}}</textarea>

                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group{{ $errors->has('mais_sobre') ? ' has-error' : '' }}">
                            <label for="mais_sobre" class="col-md-4 control-label">Mais sobre</label>

                            <div class="col-md-8">
                                <textarea class="textarea form-control" name="mais_sobre" rows="5" id="descricao">{{$evento->mais_sobre}}</textarea>

                                @if ($errors->has('mais_sobre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mais_sobre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('local') ? ' has-error' : '' }}">
                            <label for="local" class="col-md-4 control-label">Local</label>

                            <div class="col-md-6">
                                <input id="local" type="text" class="form-control" name="local" value="{{ old('local') }}"  autofocus>

                                @if ($errors->has('local'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('local') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>






                        <div class="form-group{{ $errors->has('vagas') ? ' has-error' : '' }}">
                            <label for="vagas" class="col-md-4 control-label">Número de vagas</label>

                            <div class="col-md-2">
                                <input id="vagas" type="number" class="form-control" name="vagas" value="{{$evento->vagas}}" > 

                                @if ($errors->has('vagas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vagas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      



                        <div class="form-group{{ $errors->has('cargaHoraria') ? ' has-error' : '' }}">
                            <label for="cargaHoraria" class="col-md-4 control-label">Carga Horária</label>

                            <div class="col-md-2">
                                <input id="cargaHoraria" type="number" class="form-control" name="cargaHoraria" value="{{$evento->cargaHoraria}}" > 

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
                                <input id="palestrante" class="form-control" name="palestrante" value="{{$evento->palestrante}}"  >

                                @if ($errors->has('palestrante'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('palestrante') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div data-toggle="tooltip"  title="datas não podem ser alteradas!" class="form-group{{ $errors->has('data_evento') ? ' has-error' : '' }}">
                            <label for="data_evento" class="col-md-4 control-label">Data do evento</label>

                            <div class="col-md-3">
                                <input disabled="" id="data_evento" type="date" class="form-control" name="data_evento" value="{{ $evento->data_evento }}" min="{{date('Y-m-d',strtotime($evento->data_evento))}}"  >

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
                                <input id="horario_evento" type="time" class="form-control" name="horario_evento" value="{{ $evento->horario_evento }}" >

                                @if ($errors->has('horario_evento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('horario_evento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div data-toggle="tooltip"  title="datas não podem ser alteradas!" class="form-group{{ $errors->has('data_inicio') ? ' has-error' : '' }}">
                            <label for="data_inicio" class="col-md-4 control-label">Data do início das inscrições</label>

                            <div class="col-md-3">
                                <input disabled id="data_inicio" type="date" class="form-control" name="data_inicio" value="{{ $evento->data_inicio }}" >

                                @if ($errors->has('data_inicio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_inicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div data-toggle="tooltip"  title="datas não podem ser alteradas!" class="form-group{{ $errors->has('data_fim') ? ' has-error' : '' }}">
                            <label for="data_fim" class="col-md-4 control-label">Data final das inscrições</label>

                            <div class="col-md-3">
                                <input disabled id="data_fim" type="date" class="form-control" name="data_fim" value="{{ $evento->data_fim }}" >

                                @if ($errors->has('data_fim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data_fim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                              Quem pode ver o evento?
                            </label>

                            <div class="col-md-6">
                                <table class="table table-hover">
                                <tr>
                                    <td>Agentes</td>
                                    <td>
                                        
                                            Sim <input @if($evento->agente) checked @endif name="rb_agente" type="radio" value="1">
                                    </td>
                                    <td>
                                       
                                            Não <input @if(!$evento->agente) checked @endif name="rb_agente" type="radio" value="0">

                                    </td>
                                </tr>

                                <tr>
                                    <td>Alunos</td>
                                    <td>
                                       
                                            Sim <input @if($evento->aluno) checked @endif name="rb_aluno" type="radio" value="1">
                                    </td>
                                    <td>
                                       
                                            Não <input @if(!$evento->aluno) checked @endif name="rb_aluno" type="radio" value="0">

                                    </td>

                                    
                                </tr>

                                <tr>
                                    
                                    <td>Comunidade</td>
                                    <td>
                                       
                                            Sim <input @if($evento->comunidade) checked @endif name="rb_comunidade" type="radio" value="1">
                                    </td>
                                    <td>
                                       
                                            Não <input @if(!$evento->comunidade) checked @endif name="rb_comunidade" type="radio" value="0">

                                    </td>
                                   
                                </tr>

                                <tr>
                                    
                                    <td>Professores</td>
                                    <td>
                                       
                                            Sim <input @if($evento->professor) checked @endif name="rb_professor" type="radio" value="1">
                                    </td>
                                    <td>
                                       
                                            Não <input @if(!$evento->professor) checked @endif name="rb_professor" type="radio" value="0">

                                    </td>
                                </tr>





                                </table>
                            </div>
                        </div>

                        <hr>


                        <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                            <label for="banner" class="col-md-4 control-label">Banner</label>

                            <div class="col-md-6">
                                <input type="file" name="banner">
                                @if(!$evento->has_banner)
                                <span>Ainda não possui banner</span>
                                
                                @else
                                
                                <div id="banner">
                                    <div >
                                        <div class="col-md-12"  style="
                                            margin-top: 10px;
                                            margin-bottom: 10px;
                                            height:300px; width:600px;
                                            background: url('{{ asset('assets/upload/imagens_eventos/'.$evento->id.'.jpg')}} ');
                                            background-size: 600px 300px;
                                            background-repeat: no-repeat;
                                          " class="col-md-12">
                                            
                                        </div>
                                        <br>
                                    </div>
                                    <a style="cursor: pointer;" id="deletaImagem" >
                                        Deletar banner
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div> 




                        

                        @if($evento->data_evento < date("Y-m-d"))
                            <div class="form-group{{ $errors->has('fb_link') ? ' has-error' : '' }}">
                                <label for="fb_link" class="col-md-4 control-label">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i> link
                                </label>

                                <div class="col-md-6">
                                    <input id="fb_link" type="text" class="form-control" name="fb_link" value="{{ $evento->fb_link }}"  autofocus>

                                    @if ($errors->has('fb_link'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fb_link') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        @endif
                       
       
                        





                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar
                                </button>
                            </div>
                        </div>




                    </form>
                    


                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var id= document.getElementsByName("id")[0].value;
    $('#deletaImagem').click(function() {
        $.ajax({
                url: "{{url('/admin/eventos/deletaImagem')}}",
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":id,
                },
                success: function( response ){
                    $('#banner').hide();

                },
                
            });
    });


</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    //$('textarea').ckeditor();
    $('.textarea').ckeditor(); // if class is prefered.
</script>

@endsection
