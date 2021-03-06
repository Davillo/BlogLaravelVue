<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artigo;

class ArtigosController extends Controller
{
   
    public function index(){
        $listaMigalhas = json_encode([
            ['titulo' => "Admin","url" => route('admin')],
            ['titulo' => "Lista de Artigos","url"=>'']
        ]);
        
        $listaArtigos = (Artigo::select('id','titulo','descricao','user_id','data')->paginate(5));
        foreach ($listaArtigos as $key => $value) {
          $value->user_id = \App\User::find($value->user_id)->name;
        }
        return view('admin.artigos.index',compact('listaMigalhas','listaArtigos'));
    }

    public function create()
    {
       
    }

    public function store(Request $request){
      $data = $request->all();
      
      $validate = \Validator::make($data,[
        'titulo' => 'required',
        'descricao'=>'required',
        'conteudo' => 'required',
        'data' => 'required'
      ]);
    
      if($validate->fails()){
        return redirect()->back()->withErrors($validate)->withInput();
      }
      Artigo::create($data);
      return redirect()->back();
    }

    
    public function show($id)
    { 
      return Artigo::find($id);    
    }

 
    public function edit($id)
    {
      
    }

  
    public function update(Request $request, $id)
    {
      $data = $request->all();
      
      $validate = \Validator::make($data,[
        'titulo' => 'required',
        'descricao'=>'required',
        'conteudo' => 'required',
        'data' => 'required'
      ]);
    
      if($validate->fails()){
        return redirect()->back()->withErrors($validate)->withInput();
      }
      Artigo::find($id)->update($data);
      return redirect()->back()->with('success','Salvo com sucesso.');
    }

    
    public function destroy($id){
      Artigo::find($id)->delete();
      return redirect()->back()->with('success','Excluído com sucesso.');
    }
}
