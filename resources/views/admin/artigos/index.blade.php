@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    @include('layouts.messages')
    <painel titulo="Lista de artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        <tabela-lista 
        v-bind:titulos="['#','Título','Descrição','id_autor','Data']"
        v-bind:itens="{{json_encode($listaArtigos)}}"
        criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" token="{{ csrf_token() }}"
        ordem="desc" ordemcol="1" modal="sim"
        ></tabela-lista>
        <div align="center">
            {{$listaArtigos}}
        </div>
    </painel>
</pagina>


<modal nome="adicionar" titulo="Adicionar"> <!--MODAL ADICIONAR-->
  <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
    
    <div class="form-group">
        <label for="titulo"> Título </label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}" />
    </div>

    <div class="form-group">
        <label for="descricao"> Descrição </label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" value="{{old('descricao')}}" />
    </div>

    <div class="form-group">
        <label for="conteudo"> Conteúdo </label>
        <textarea name="conteudo" id="conteudo" class="form-control">{{old('conteudo')}}</textarea>
    </div>

    <div class="form-group">
        <label for="data"> Data </label>
        <input type="date" class="form-control" value="{{old('data')}}" id="data" name="data" />
    </div>
   </formulario> 

   <span slot="botoes">
       <button form="formAdicionar" class="btn btn-info">Adicionar</button> 
   </span>
  
</modal><!-- FIM MODAL ADICIONAR-->

<modal nome="editar" titulo="Editar"><!-- INICIO MODAL EDITAR-->
  <formulario id="formEditar" css="" v-bind:action="'/admin/artigos/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">

    <div class="form-group">
        <label for="titulo"> Título </label>
        <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título" />
    </div>

    <div class="form-group">
        <label for="descricao"> Descrição </label>
        <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição" />
    </div>

    <div class="form-group">
        <label for="conteudo"> Conteúdo </label>
        <textarea name="conteudo" id="conteudo" class="form-control" v-model="$store.state.item.conteudo"></textarea>
    </div>

    <div class="form-group">
        <label for="data"> Data </label>
        <input type="date" class="form-control" v-model="$store.state.item.data" id="data" name="data" />
    </div>
  </formulario>

  <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button> 
  </span>

</modal><!-- FIM MODAL EDITAR-->


<modal nome="detalhe" v-bind:titulo="$store.state.item.titulo"><!-- INICIO MODAL DETALHE-->
  <p>@{{$store.state.item.descricao}}</p>
  <p>@{{$store.state.item.conteudo}}</p>
</modal><!-- FIM MODAL DETALHE-->

@endsection
