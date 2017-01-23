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


Route::group(['middleware'=>'guest'], function () {



    Route::get('/register', function(){
    	return view('auth.register');
    });

    Route::post('/register', 'Auth\RegisterController@validator');

    Route::get('/login', function(){
    	return view('auth.login');
    });
    Route::post('/login', 'Auth\LoginController@authenticate');
    
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

    Route::post('admin/eventos/register', 'Admin\EventoController@register');
    Route::post('admin/eventos/update', 'Admin\EventoController@update');


    Route::get('admin/eventos/delete/{id}','Admin\EventoController@confirmDelete');
    Route::post('admin/eventos/deletar','Admin\EventoController@delete');

    Route::post('admin/eventos/deletaImagem','Admin\EventoController@deletaImagem');

    Route::post('admin/eventos/finalizarEvento','Admin\EventoController@finalizarEvento');
    Route::post('/admin/eventos/reativarEvento','Admin\EventoController@reativarEvento');

    Route::post('admin/eventos/register_by_cpf','Admin\EventoController@register_by_cpf');
   

});

//route user

Route::group(['middleware'=>'auth'], function () {
    Route::get('user/', function ()    {
        return redirect('user/eventos');
    });
    Route::get('user/evento/{id}','User\EventoController@evento');

    Route::get('user/eventos', 'User\EventoController@listar');
    Route::post('user/evento/participar/','User\EventoController@participar');
    Route::post('user/evento/sair/','User\EventoController@sair');
    Route::get('user/eventos_cadastrados','User\EventoController@eventos_cadastrados');
});

