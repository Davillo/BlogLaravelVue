<?php
use App\Artigo;


Route::get('/', function () {
    $lista = Artigo::all();
    $lista = (Artigo::select('id','titulo','descricao','user_id','data')->
    whereDate('data','<=',date('Y-m-d'))->orderBy('data','DESC')->paginate(3));
        foreach ($lista as $key => $value) {
          $value->user_id = \App\User::find($value->user_id)->name;
        }
    return view('site',compact('lista'));
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function (){
    Route::resource('artigos','ArtigosController');
    Route::resource('usuarios','UsuariosController');
    Route::resource('autores','AutoresController');
});
