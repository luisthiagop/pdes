<?php

namespace App\Http\Controllers\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;


class publicController extends Controller
{
	protected $today;

    public function __construct(){
        $this->today = date("Y-m-d");
        $this->now = date("H:m:s");


    }

    protected function index (){
    	$eventos_hoje = DB::table('events')->where('data_evento','=',$this->today)->paginate(7);
    	$eventos_futuros = DB::table('events')->where('data_inicio','>',$this->today)->orderBy('data_evento', 'asc')->paginate(7);
    	$eventos_atuais = DB::table('events')->where('data_inicio','<=',$this->today)->where('data_fim','>=',$this->today)->orderBy('data_evento', 'asc')->paginate(7);
    	$eventos_passados = DB::table('events')->where('data_evento','<',$this->today)->orderBy('data_evento', 'asc')->paginate(7);
    	//return view('admin.eventos')->with('futuros',$eventos_futuros)->with('atuais',$eventos_atuais)->with('passados',$eventos_passados)->with('hoje',$eventos_hoje);
    	return view('public.list')->with('eventos_atuais',$eventos_atuais)->with('eventos_futuros',$eventos_futuros)->with('eventos_passados',$eventos_passados);



    }

    protected function show($id){
    	$evento = DB::table('events')->find($id);	
    	return view('public.show')->with('e',$evento);

    }

    protected function verify($id){
    	if(Auth::check()){
    		return redirect('/user/evento/'.$id);
    	}else{
    		return redirect('/public/'.$id);
    	}
    }



}
