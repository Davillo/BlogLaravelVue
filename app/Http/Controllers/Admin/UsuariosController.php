<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller{
  
    public function index(){
        $listaMigalhas = json_encode([
          ['titulo' => "Admin","url" => route('admin')],
            ['titulo' => 'Lista de Usuários',"url"=>'']
        ]);
        
        $listaModelo = (User::select('id','name','email')->paginate(5));
        return view('admin.usuarios.index',compact('listaMigalhas','listaModelo'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $data = $request->all();
      
        $validate = \Validator::make($data,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
      
        if($validate->fails()){
          return redirect()->back()->withErrors($validate)->withInput();
        }

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->back()->with('success','Salvo com sucesso.');
    }

   
    public function show($id){
        return User::find($id);
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id){
        $data = $request->all();

        
        if(isset($data['password']) && $data['password'] != ""){
          $validacao = \Validator::make($data,[
            'name' => 'required|string|max:255',
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($id)],
            'password' => 'required|string|min:6',
          ]);
          $data['password'] = bcrypt($data['password']);
        }else{
          $validacao = \Validator::make($data,[
            'name' => 'required|string|max:255',
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($id)]
          ]);
          unset($data['password']);
        }

        if($validacao->fails()){
          return redirect()->back()->withErrors($validacao)->withInput();
        }
  
        User::find($id)->update($data);
        return redirect()->back()->with('success','Salvo com sucesso.');
    }

    
    public function destroy($id){
        User::find($id)->delete();
        return redirect()->back()->with('success','Excluído com sucesso.');
    }
}
