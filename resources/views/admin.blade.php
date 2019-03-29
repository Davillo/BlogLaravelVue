@extends('layouts.app')

@section('content')
<pagina tamanho="15">

<painel titulo="Dashboard">
<migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
    <div class="row">
        <div class="col-md-4">
        
            <caixa qtd="{{$numArtigos}}" titulo="Artigos" url="{{route('artigos.index')}}" cor="orange" icone="ion ion-pie-graph"></caixa>
        </div>

        <div class="col-md-4">
                <caixa qtd="{{$numUsers}}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="blue" icone="ion ion-person-stalker"></caixa>
        </div>

        <div class="col-md-4">
        <caixa qtd="{{$numAutores}}" titulo="Autores" url="{{route('autores.index')}}" cor="red" icone="ion ion-person"></caixa>
        </div>
    </div>

    </painel>
</pagina>
@endsection
