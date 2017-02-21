<?php

namespace App\Http\Controllers\User;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Evento;
use App\Inscricao;
use App\User;



class EventoController extends Controller
{
    protected $today;

    public function __construct(){
        $this->today = date("Y-m-d");
        $this->now = date("H:m:s");


    }

 	protected function listar()
    {  

        $eventos = Evento::where('data_fim','>=',$this->today)->where('data_inicio','<=',$this->today)->where('data_evento','>=',$this->today)->where(Auth::user()->tipo,'=',1)->orderBy('data_evento', 'asc')->paginate(3);
        $eventos_passados = Evento::where('data_evento','<',$this->today)->orderBy('data_evento', 'asc')->paginate(20);       

        $inscricao = new User;
        $eventos_cadastrados = $inscricao->eventos()->orWhere('user_id', Auth::user()->id)->paginate(20);
        
    	return view('user.eventos')->with('eventos',$eventos)->with('eventos_passados',$eventos_passados)->with('eventos_cadastrados',$eventos_cadastrados);
 	} 


   


 	protected function evento($id){
        

        //dd($id);
    	$evento =  Evento::where('id',$id)->where('data_inicio', '<=', $this->today )->where('data_fim','>=',$this->today)->first();


        if($evento){
            $op = array(
                'aluno'=> $evento->aluno,
                'agente'=> $evento->agente,
                'comunidade'=> $evento->comunidade,
                'professor'=> $evento->professor
            );
            
            if($op[Auth::user()->tipo]){

                $participa = Inscricao::where('user_id',Auth::user()->id)->where('evento_id',$evento->id)->get();
                

            	return view('user.evento')->with('evento',$evento)->with('participa',$participa);
            }else{
                return redirect()->back()->with('erro','Você não tem acesso a esse evento');
            }
        }else{
             return redirect()->back()->with('erro','Você não tem acesso a esse evento');
        }

    }

    protected function participar(Request $request){   	


    	$evento =  Evento::where('id',$request->id)->first();
        $insc = Inscricao::where('evento_id',$request->id)->where('user_id',Auth::user()->id)->first();
        
    	if(!$insc && $evento->data_inicio <=  $this->today && $evento->data_fim >=  $this->today){
            if($evento->vagas <= $evento->inscritos){
                return Redirect()->action( 'User\EventoController@listar')->with('erro','O numero de vagas para esse evento esgoutou.');
            }else{
    	    	$insc = Inscricao::firstOrNew(['user_id'=>Auth::user()->id,'evento_id'=>$request->id]);
                $insc->horas = $evento->cargaHoraria;
                $insc->save();
                $evento->inscritos++;
                $evento->save();
    	    	return redirect()->back()->with('success','Parabéns, você está cadastrado no evento!');
            }

    	}else{
            return redirect()->back()->with('erro','Você ja participa desse evento!');

        }

    }

    protected function sair(Request $request){
   
        $insc = Inscricao::where('evento_id',$request->id)->where('user_id',Auth::user()->id)->first();
        $evento =  Evento::where('id',$request->id)->first();

        if($evento->data_evento > $this->today||($evento->data_evento == $this->today && $evento->horario_evento >  $this->now  )){            
            
            $insc->delete();

            
            $evento->inscritos=$evento->inscritos-1;
            
            $evento->save();
            
            return redirect()->back()->with('success','Você saiu do evento!');
        }else{
            return redirect()->back()->with('erro','Você não pode sair de um evento que ja aconteceu');
        }

    }
             

}
