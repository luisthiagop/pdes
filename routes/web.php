<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get('/','HomeController@index');
Route::get('/public','Publico\publicController@index');
Route::get('/public/{id}','Publico\publicController@show');
Route::get('/verify/{id}','Publico\publicController@verify');



Route::group(['middleware'=>'guest'], function () {
    Auth::routes();

    //register

    Route::get('/register', function(){
    	return view('auth.register');
    });

    Route::post('/register', 'Auth\RegisterController@validator');

    // //login
    Route::get('/login', function(){
        return view('auth.login');
    });
    Route::get('/login/{id}', function($id){
        return view('auth.login')->with('id',$id);
    });
    Route::post('/login/{id}', 'Auth\LoginController@authenticate');



    
});


Route::post('/logout','Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');
Route::get('eventos_anteriores', 'User\EventoController@eventos_anteriores');




//route admin
Route::group(['middleware'=>['admin','auth']], function () {

    Route::get('admin/', function ()    {
        return redirect('admin/eventos');
    });
    Route::get('admin/eventos', 'Admin\EventoController@listar');

    Route::get('admin/evento/{id}','Admin\EventoController@editarEvento');


    Route::get('admin/eventos/relatorio/{id}','Admin\EventoController@relatorio');
    Route::get('admin/eventos/relatorio/export/{id}','Admin\EventoController@exportaRelatorio');
    Route::get('admin/eventos/relatorio/export/csv/{id}','Admin\EventoController@exportaCSV');
    

    Route::post('admin/eventos/register', 'Admin\EventoController@register');
    Route::post('admin/eventos/update', 'Admin\EventoController@update');


    Route::get('/admin/eventos/delete/{id}','Admin\EventoController@confirmDelete');
    Route::post('/admin/eventos/deletar','Admin\EventoController@delete');

    Route::post('/admin/eventos/deletaImagem','Admin\EventoController@deletaImagem');

    Route::post('/admin/eventos/finalizarEvento','Admin\EventoController@finalizarEvento');
    Route::post('/admin/eventos/reativarEvento','Admin\EventoController@reativarEvento');

    Route::post('/admin/eventos/register_by_cpf','Admin\EventoController@register_by_cpf');

    Route::post('/admin/eventos/cargaHoraria','Admin\EventoController@updateCargaHoraria');

    Route::post('/admin/eventos/removerParticipante','Admin\EventoController@removerParticipante');


    Route::post('admin/eventos/relatorio/sendmail','Admin\EventoController@sendMail');

});

Route::post('/admin/eventos/cargaHoraria','Admin\EventoController@updateCargaHoraria');

Route::get('/admin/eventos/send_mail','Admin\EventoController@send_mail_get');
Route::post('/admin/eventos/send_mail','Admin\EventoController@send_mail');


//route user
Route::group(['middleware'=>'auth'], function () {
    Route::get('user/', function ()    {
        return redirect('user/eventos');
    });
    Route::get('user/evento/{id}','User\EventoController@evento');

    Route::get('user/eventos', 'User\EventoController@listar');
    Route::post('user/evento/participar/','User\EventoController@participar');
    Route::post('user/evento/sair/','User\EventoController@sair');
    
});

