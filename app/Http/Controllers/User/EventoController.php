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

 	protected function listar(){  

        $eventos = Evento::where('data_fim','>=',$this->today)->where('data_inicio','<=',$this->today)->where('data_evento','>=',$this->today)->orderBy('data_evento', 'asc')->get();       
        
    	return view('user.eventos')->with('eventos',$eventos);
 	} 


    protected function eventos_anteriores(){
        
        $eventos_passados = DB::table('eventos')->where('data_evento','<',$this->today)->orderBy('data_evento', 'asc')->get();
        return view('user.eventos_anteriores')->with('eventos',$eventos_passados);

    } 

    protected function eventos_cadastrados(){
        $inscricao = new User;
        $eventos = $inscricao->eventos()->orWhere('user_id', Auth::user()->id)->get();

        return view('user.eventos_cadastrados')->with('eventos',$eventos);
    }  

 	protected function evento($id){
        //verificar se esta disponivel para o usuario
    	$evento =  Evento::where('id',$id)->where('data_inicio', '<=', $this->today )->where('data_fim','>=',$this->today)->first();

        //dd($evento);

        $participa = Inscricao::where('user_id',Auth::user()->id)->where('evento_id',$evento->id)->get();
        //dd($participa);

    	return view('user.evento')->with('evento',$evento)->with('participa',$participa);

    }

    protected function participar(Request $request){
    	//echo $request->id . " -------- ". Auth::user()->id;
    	//dd($request->all());

        if (isset($_POST['g-recaptcha-response'])) {
                $captcha_data = $_POST['g-recaptcha-response'];
            }
            $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ley_REUAAAAAKyiMxV-tyQ9tWLUtbsFiUrmfZti&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
            
            $responseData = json_decode($resposta);
            //dd($responseData);    
            if ($responseData->success==true) {    


            	$evento =  Evento::where('id',$request->id)->first();
                $insc = Inscricao::where('evento_id',$request->id)->where('user_id',Auth::user()->id)->first();
                //dd($insc);
            	if(!$insc && $evento->data_inicio <=  $this->today && $evento->data_fim >=  $this->today){
                    if($evento->vagas <= $evento->inscritos){
                        return Redirect()->action( 'User\EventoController@listar')->withErrors(['O numero de vagas para esse evento esgoutou :/']);
                    }else{
            	    	$insc = Inscricao::firstOrNew(['user_id'=>Auth::user()->id,'evento_id'=>$request->id]);
                        $insc->horas = $evento->cargaHoraria;
                        $insc->save();
                        $evento->inscritos++;
                        $evento->save();
            	    	return redirect()->action( 'User\EventoController@eventos_cadastrados');
                    }

            	}else{
            		return redirect()->action( 'User\EventoController@listar');
                }
            }else{

                abort(401,'Precisamos saber se você é um humano');



            }

    }

    protected function sair(Request $request){
            //dd($_POST);
            if (isset($_POST['g-recaptcha-response'])) {
                $captcha_data = $_POST['g-recaptcha-response'];
            }
            $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ley_REUAAAAAKyiMxV-tyQ9tWLUtbsFiUrmfZti&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
            //dd($resposta);
            $responseData = json_decode($resposta);
            //dd($responseData);    
            if($responseData->success==true) {        


                $insc = Inscricao::where('evento_id',$request->id)->where('user_id',Auth::user()->id)->first();

                $evento =  Evento::where('id',$request->id)->first();


                if($evento->data_evento > $this->today||($evento->data_evento == $this->today && $evento->horario_evento >  $this->now  )){

                    
                    
                    $insc->delete();

                    
                    $evento->inscritos--;
                    $evento->save();

                    return redirect()->back()->with('sucess','Você não participa mais desse evento');
                }else{
                    return redirect()->back()->with('erro','Você não pode sair de um evento que ja aconteceu');
                }

            }else{
                abort(401);


            }



    }

}
