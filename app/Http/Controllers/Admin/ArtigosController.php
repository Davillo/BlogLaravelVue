<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artigo;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ['titulo' => "Home","url" => route('home')],
            ['titulo' => "Lista de Artigos","url"=>'']
        ]);
        
        $listaArtigos = json_encode(Artigo::select('id','titulo','descricao','data')->get());
        return view('admin.artigos.index',compact('listaMigalhas','listaArtigos'));
    }

   
    public function create()
    {
       
    }

    
  
    public function store(Request $request)
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
      Artigo::create($data);
      return redirect()->back();
    }

    
    public function show($id)
    {
       
    }

 
    public function edit($id)
    {
      
    }

  
    public function update(Request $request, $id)
    {
      
    }

    
    public function destroy($id)
    {
       
    }
}
