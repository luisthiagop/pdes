<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Evento;
use App\Inscricao;
use App\User;
use Excel;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Input;


class EventoController extends Controller
{

    public function __construct(){
        $this->today = date("Y-m-d");
        $this->now = date("H:i:s");
       
    }

    protected function verificaEvento($evento){
        //if($evento->status && !$evento->disabled){
        //    return true;
        //}
        //return false;
    }


    protected function register(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'nome' => 'required|max:255',
            'descricao' => '',
            'cargaHoraria' => 'required',
            'vagas'=>'required|min:1',
            'palestrante'=>'max:100',
            'data_evento'=>'required|date|',
            'horario_evento'=>'required','after:data_fim',
            'data_inicio'=>'required|date|before:data_fim|before:data_evento',
            'data_fim'=>'required|date|before:data_evento',
            'banner' => 'image|mimes:jpg,jpeg|max:2048',
        ]);


        $evento = new Evento();
        $evento->nome = $request->nome;

        $evento->descricao = $request->descricao;

        $evento->vagas = $request->vagas;

        $evento->cargaHoraria = $request->cargaHoraria;

        $evento->palestrante = $request->palestrante;

        $evento->data_evento = $request->data_evento;

        $evento->horario_evento = $request->horario_evento;

        $evento->data_inicio = $request->data_inicio;

        $evento->data_fim = $request->data_fim;

        if($request->banner){
            $evento->has_banner = true;
        }
        
        //dd($evento->all());

        



        $evento->save();  
        //dd($request->banner);
        if($request->banner){
            $imageName = $evento->id.'.'.$request->banner->getClientOriginalExtension();
            $evento->name_banner = $imageName;

            $evento->save();

            $request->banner->move('assets/upload/imagens_eventos/', $imageName); 
        }

        return back()->with('success','Evento <strong>'.$evento->nome.'</strong> cadastrado com sucesso');
        
    
    }


    protected function update(Request $request)
    {
        $evento = Evento::find($request->id);

        //if(!$this->verificaEvento($evento)){
        //    return back()->with('erro','Esse evento não pode ser editado pois está desabilitado ou finalizado');
        //}

        $this->validate($request, [
            'nome' => 'required|max:255',
            'descricao' => '',
            'cargaHoraria' => 'required',
            'vagas'=>'required|min:1',
            'palestrante'=>'max:100',
            'data_evento'=>'required|date|',
            'horario_evento'=>'required','after:data_fim',
            'data_inicio'=>'required|date|before:data_fim|before:data_evento',
            'data_fim'=>'required|date|before:data_evento',
            'banner' => 'image|mimes:jpg,jpeg|max:2048',
        ]);
        
        $evento->nome = $request->nome;

        $evento->descricao = $request->descricao;

        $evento->vagas = $request->vagas;

        $evento->cargaHoraria = $request->cargaHoraria;

        $evento->palestrante = $request->palestrante;

        $evento->data_evento = $request->data_evento;

        $evento->horario_evento = $request->horario_evento;

        $evento->data_inicio = $request->data_inicio;

        $evento->data_fim = $request->data_fim;

        if($request->banner){
            $evento->has_banner = true;
        }
        
  
        $evento->save();  
        
        if($request->banner){
            $imageName = $evento->id.'.'.$request->banner->getClientOriginalExtension();
            $evento->name_banner = $imageName;

            $evento->save();

            $request->banner->move('assets/upload/imagens_eventos/', $imageName); 
        }

        return back()->with('success','Evento editado com sucesso');

        
    }

    protected function listar(){
        $eventos_hoje = DB::table('eventos')->where('data_evento','=',$this->today)->get();
    	$eventos_futuros = DB::table('eventos')->where('data_inicio','>',$this->today)->orderBy('data_evento', 'asc')->get();
        $eventos_atuais = DB::table('eventos')->where('data_inicio','<=',$this->today)->where('data_evento','>=',$this->today)->orderBy('data_evento', 'asc')->get();
        $eventos_passados = DB::table('eventos')->where('data_evento','<',$this->today)->orderBy('data_evento', 'asc')->get();
    	return view('admin.eventos')->with('futuros',$eventos_futuros)->with('atuais',$eventos_atuais)->with('passados',$eventos_passados)->with('hoje',$eventos_hoje);

    } 

    protected function editarEvento($id){
        $evento =  DB::table('eventos')->where('id',$id)->first();
           	

    	return view('admin.editarEvento')->with('evento',$evento);

    }

    protected function evento($id){
    	$evento =  DB::table('eventos')->where('id',$id)->first();

    	return view('evento')->with('evento',$evento);

    }



    protected function confirmDelete($id){
    	$evento =  DB::table('eventos')->where('id',$id)->first();
        
        //dd(!$this->verificaEvento($evento));
        //if(!$this->verificaEvento($evento)){
            //return back()->with('erro','Esse evento não pode ser excluido pois está desabilitado ou finalizado');        }
    	return view('admin.confirmDelete')->with('evento',$evento);    	
    }

    protected function delete(Request $request){
        //dd($request->all());
    	$evento = Evento::find($request->id);
        
        if($evento->data_evento > $this->today||($evento->data_evento == $this->today && $evento->horario_evento >  $this->now  )){
            //dd($evento->data_evento > $this->today);
            $evento->delete();
            //dd();
            return back()->with('success','Evento deletado')->with('evento',$evento);
        }else{
            return back()->with('erro','esse evento não pode mais ser deletado')->with('evento',$evento);
        }
    }

    protected function register_by_cpf(Request $request){
        $cpf1 = explode(".",$request->cpf);
        $request->cpf = implode("",$cpf1);
        $cpf1= explode("-",$request->cpf);
        $request->cpf = implode("",$cpf1);
        $user= DB::table('users')->where('cpf','=',$request->cpf)->first();
        

        if($user){
            $insc= new Inscricao();

            $insc->evento_id= $request->id;
            $insc->user_id = $user->id;

            $insc->save();
            return back()->with('success','O usuario foi adicionado ao evento!');
        }else{
            return back()->with('erro','Não existe usuario cadastrado com esse CPF');
        }


    }

    protected function relatorio($id){
        $evento =  DB::table('eventos')->where('id',$id)->first();      


        $inscricao = new Evento;
        $users = $inscricao->users()->orWhere('evento_id',$id)->get();
        //dd($users);
        return view('admin.relatorio')->with('evento',$evento)->with('users',$users);
    }

    protected function exportaRelatorio($id){
        $evento =  DB::table('eventos')->where('id',$id)->first();
        $this->id=$id;


        Excel::create('Lista_presenca_'.$evento->nome,function($excel){
            $excel = $excel->sheet('sheetname',function($sheet){
                $data=[];
                array_push($data, array('Nome','CPF','Assinatura               '));
                $sheet->fromArray($data,null,'A1',false,false);
                $line  =3;

                $inscricao = new Evento;
                $users = $inscricao->users()->orWhere('evento_id',$this->id)->get();

                foreach($users as $user){
                    $sheet->row($line++, array(
                       $user->name , $user->cpf,''
                    ));
                }
                
            });

            


        })->download('xlsx');

        return redirect()->back();
    }

    protected function deletaImagem(Request $request){
        
        $evento = Evento::find($request->id);
        $evento->has_banner=false;
        //deletar a imagem da pasta

        $evento->save();

    }

    protected function finalizarEvento(Request $request){
        //$evento = Evento::find($request->id);
        //$evento->status=false;
        //$evento->save();
        
    }

    //protected function reativarEvento(Request $request){
        //$evento = Evento::find($request->id);
        //if($evento->data_evento >= $this->today && !$evento->status){
        //    $evento->status=true;
        //    $evento->save();

        //}else{     
           //não esta dando certo   
         //   return response()->json( false );
        //}
        
    //}


}
