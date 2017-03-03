<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Evento;
use App\Inscricao;
use App\User;
use Illuminate\Support\Facades\Auth;
use Excel;
use Mail;
use App\Mail\WelcomeMail;
use App\Mail\CadastradoEvento;
use App\Mail\CancelarParticipacaoEvento;
use App\Mail\ExcluidoEvento;
use App\Mail\Mensagem;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Input;


class EventoController extends Controller
{

	public function __construct(){
		$this->today = date("Y-m-d");
		$this->now = date("H:i:s");	   
	}



	protected function register(Request $request)
	{
		$this->validate($request, [
			'nome' => 'required|max:255',
			'descricao' => 'max:500',
			'mais_sobre' => '',
			'cargaHoraria' => 'required',
			'vagas'=>'required|min:1',
			'palestrante'=>'max:100',
			'data_evento'=>'required|date|',
			'horario_evento'=>'required','after:data_fim',
			'data_inicio'=>'required|date|before:data_fim|before:data_evento',
			'data_fim'=>'required|date|before:data_evento',
			'banner' => 'image|mimes:jpg,jpeg|max:2048',
			'rb_aluno'=>'required',
			'rb_agente'=>'required',
			'rb_comunidade'=>'required',
			'rb_professor'=>'required',
		]);


		$evento = new Evento();
		$evento->nome = $request->nome;
		$evento->mais_sobre = $request->mais_sobre;
		$evento->descricao = $request->descricao;
		$evento->vagas = $request->vagas;
		$evento->cargaHoraria = $request->cargaHoraria;
		$evento->palestrante = $request->palestrante;
		$evento->data_evento = $request->data_evento;
		$evento->horario_evento = $request->horario_evento;
		$evento->data_inicio = $request->data_inicio;
		$evento->data_fim = $request->data_fim;
		$evento->aluno = $request->rb_aluno;
		$evento->agente = $request->rb_agente;
		$evento->comunidade = $request->rb_comunidade;
		$evento->professor = $request->rb_professor;
		if($request->banner){
			$evento->has_banner = true;
		}

		$evento->save();  
		if($request->banner){
			$imageName = $evento->id.'.jpg';
			$evento->name_banner = $imageName;
			$evento->save();
			$request->banner->move('assets/upload/imagens_eventos/', $imageName); 
		}


		return back()->with('success','Evento <strong>'.$evento->nome.'</strong> cadastrado com sucesso');
		
	
	}


	protected function update(Request $request)
	{


		$evento = Evento::find($request->id);

		
		$this->validate($request, [
			'nome' => 'required|max:255',
			'descricao' => 'max:500',
			'mais_sobre' => '',
			'cargaHoraria' => 'required',
			'horario_evento: required',
			'vagas'=>'required|min:1',
			'palestrante'=>'max:100',
			'banner' => 'image|mimes:jpg,jpeg|max:2048',
			'rb_aluno'=>'required',
			'rb_agente'=>'required',
			'rb_comunidade'=>'required',
			'rb_professor'=>'required',
		]);
		
		
		$evento->nome = $request->nome;
		$evento->mais_sobre = $request->mais_sobre;
		$evento->descricao = $request->descricao;
		$evento->vagas = $request->vagas;
		$evento->cargaHoraria = $request->cargaHoraria;
		$evento->palestrante = $request->palestrante;
		$evento->fb_link = 'http://'.$request->fb_link;


		$evento->aluno = $request->rb_aluno;
		$evento->agente = $request->rb_agente;
		$evento->comunidade = $request->rb_comunidade;
		$evento->professor = $request->rb_professor;

		if($request->banner){
			$evento->has_banner = true;
		}		
  
		$evento->save();
		
		if($request->banner){
			
			$imageName = $evento->id.'.jpg';
			$evento->name_banner = $imageName;
			$evento->save();
			$request->banner->move('assets/upload/imagens_eventos/', $imageName); 
		}

		return back()->with('success','Evento editado com sucesso');

		
	}

	protected function listar()
	{
		$eventos_hoje = DB::table('events')->where('data_evento','=',$this->today)->get();
		$eventos_futuros = DB::table('events')->where('data_inicio','>',$this->today)->orderBy('data_evento', 'asc')->get();
		$eventos_atuais = DB::table('events')->where('data_inicio','<=',$this->today)->where('data_evento','>=',$this->today)->orderBy('data_evento', 'asc')->get();
		$eventos_passados = DB::table('events')->where('data_evento','<',$this->today)->orderBy('data_evento', 'asc')->get();
		return view('admin.eventos')->with('futuros',$eventos_futuros)->with('atuais',$eventos_atuais)->with('passados',$eventos_passados)->with('hoje',$eventos_hoje);

	} 

	protected function editarEvento($id)
	{
		$evento =  DB::table('events')->where('id',$id)->first();	
		return view('admin.editarEvento')->with('evento',$evento);

	}

	protected function evento($id)
	{
		$evento =  DB::table('events')->where('id',$id)->first();
		return view('evento')->with('evento',$evento);

	}



	protected function confirmDelete($id)
	{
		$evento =  DB::table('events')->where('id',$id)->first();		
		return view('admin.confirmDelete')->with('evento',$evento);    	
	}

	protected function delete(Request $request){
		$evento = Evento::find($request->id);
		//verificar se um add($evento->name_banner);
		if(file_exists('assets/upload/imagens_eventos/'.$evento->name_banner)){
				unlink('assets/upload/imagens_eventos/'.$evento->name_banner);
		}

		if($evento->data_evento > $this->today||($evento->data_evento == $this->today && $evento->horario_evento >  $this->now  )){	

			$inscricoes = Inscricao::join('users','users.id','=','inscricoes.user_id')->where('evento_id','=',$evento->id)->select('users.*','inscricoes.horas')->get();

			Mail::to($inscricoes)->send(new ExcluidoEvento($evento->id));

			$evento->delete();
			
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
		$evento = Evento::find($request->id);
		if($user){
			$insc= new Inscricao();
			$insc->evento_id= $request->id;
			$insc->user_id = $user->id;
			$insc->horas = $evento->cargaHoraria;
			$insc->save();

			$evento->inscritos++;
			$evento->save();


			
			return back()->with('success','O usuario foi adicionado ao evento!');
		}else{
			return back()->with('erro','Não existe usuario cadastrado com esse CPF');
		}


	}

	protected function relatorio($id){
		$evento =  DB::table('events')->where('id',$id)->first(); 
		//$inscricao = new Inscricao;
		//$users = $inscricao->users()->orWhere('evento_id',$id)->get();
		//$inscricoes = $inscricao->user()->orWhere('evento_id', $id)->toSql();	
		//dd($inscricoes);

		//dd($inscricoes);


		$inscricoes = Inscricao::join('users','users.id','=','inscricoes.user_id')->where('evento_id','=',$evento->id)->select('users.*','inscricoes.horas')->get();
		
		return view('admin.relatorio')->with('evento',$evento)->with('inscricoes',$inscricoes);
	}


	protected function exportaRelatorio($id){
		$evento =  DB::table('events')->where('id',$id)->first();
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
					   $user->cpf,$user->name
					));
				}
				
			});	

		})->download('xlsx');

		return redirect()->back();
	}

	protected function exportaCSV($id){
		$evento =  DB::table('events')->where('id',$id)->first();
		$this->id=$id;
		Excel::create('participantes_'.$evento->nome,function($excel){
			$excel = $excel->sheet('sheetname',function($sheet){
				$data=[];
				array_push($data, array('CPF','Nome'));
				$sheet->fromArray($data,null,'A1',false,false);
				$line  =1;
				$inscricao = new Evento;
				$users = $inscricao->users()->orWhere('evento_id',$this->id)->get();

				foreach($users as $user){
					$sheet->row($line++, array(
					   $user->cpf,$user->name
					));
				}
				
			});	

		})->download('csv');

		return redirect()->back();
	}

	protected function deletaImagem(Request $request){
		
		$evento = Evento::find($request->id);
		$evento->has_banner=false;
		
		
		if(file_exists('assets/upload/imagens_eventos/'.$evento->name_banner)){
			unlink('assets/upload/imagens_eventos/'.$evento->name_banner);

		}

		
		$evento->save();

	}

	protected function updateCargaHoraria(Request $request){
		$ins= Inscricao::where('evento_id','=',$request->evento_id)->where('user_id','=',$request->user_id)->first();
		$ins->horas = $request->horas;
		$ins->save();
		return response(200);
                  
	}

	protected function removerParticipante(Request $request){
		$ins= Inscricao::where('evento_id','=',$request->evento_id)->where('user_id','=',$request->user_id)->first();
		$ins->delete();
		$evento= Evento::find($request->evento_id)->first();
		$evento->inscritos--;
		$evento->save();

		Mail::to(Auth::user())->send(new ExcluidoEvento($evento->id));
		return response(200);
                  
	}

	protected function sendMail(Request $request){

		$this->validate($request, [
            'mensagem' => 'required|max:1000',
        ]);

        $inscricoes = Inscricao::join('users','users.id','=','inscricoes.user_id')->where('evento_id','=',$request->evento_id)->select('users.*','inscricoes.horas')->get();


		Mail::to($inscricoes)->send(new Mensagem($request->mensagem));

		return back()->with('success','E-mail enviado com sucesso!');


		
	}

	protected function send_mail_get(){
		
		return view('mails.send');

		
	}




}
