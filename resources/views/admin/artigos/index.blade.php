@extends('layouts.app')

@section('content')
<pagina tamanho="12">

    <painel titulo="Lista de artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      
       
        </modallink>
        <tabela-lista 
        v-bind:titulos="['#','Título','Descrição']"
        v-bind:itens="{{$listaArtigos}}"
        criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="1234567"
        ordem="desc" ordemcol="1" modal="sim"
        ></tabela-lista>

    </painel>
</pagina>
<modal nome="adicionar">
<painel titulo="adicionar">
  <formulario css="" action="#" method="put" enctype="" token="123123">
    <div class="form-group">
        <label for="titulo"> Título </label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" />
    </div>
    <div class="form-group">
        <label for="descricao"> Descrição </label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" />
    </div>
    <button class="btn btn-info">Adicionar</button> 
  </formulario>
<painel>
</modal>

<modal nome="editar">
<painel titulo="Editar">
  <formulario css="" action="#" method="put" enctype="" token="123123">
    <div class="form-group">
        <label for="titulo"> Título </label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" />
    </div>
    <div class="form-group">
        <label for="descricao"> Descrição </label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" />
    </div>
    <button class="btn btn-info">Atualizar</button> 
  </formulario>
<painel>
</modal>

@endsection
