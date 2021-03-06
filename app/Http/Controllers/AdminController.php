<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artigo;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ['titulo' => "Admin","url"=> '']
        ]);
        $numArtigos = Artigo::count();
        $numUsers = User::count();
        $numAutores = User::where('autor', '=','S')->count();
        return view('admin',compact('listaMigalhas','numArtigos','numUsers','numAutores'));
    }
}
