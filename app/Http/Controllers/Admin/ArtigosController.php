<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        
        $listaArtigos = json_encode([
            ['id'=> 1 , 'titulo' => 'PHP OO','descricao' => 'Curso de PHP OO'],
            ['id'=> 2 , 'titulo' => 'VUE JS','descricao' => 'Curso de VUE JS']
        ]);
        return view('admin.artigos.index',compact('listaMigalhas','listaArtigos'));
    }

   
    public function create()
    {
       
    }

    
  
    public function store(Request $request)
    {
       
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
