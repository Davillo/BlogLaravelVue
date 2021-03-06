@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    @include('layouts.messages')
    <painel titulo="Lista de Autores">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        <tabela-lista 
        v-bind:titulos="['#','Nome','E-mail']"
        v-bind:itens="{{json_encode($listaModelo)}}"
        criar="#criar" detalhe="/admin/autores/" editar="/admin/autores/" 
        ordem="desc" ordemcol="1" modal="sim"
        ></tabela-lista>
        <div align="center">
            {{$listaModelo}}
        </div>
    </painel>
</pagina>


<modal nome="adicionar" titulo="Adicionar"> <!--MODAL ADICIONAR-->
  <formulario id="formAdicionar" css="" action="{{route('autores.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
    
    <div class="form-group">
        <label for="name"> Nome </label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}" />
    </div>

    <div class="form-group">
        <label for="descricao"> E-mail </label>
        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}" />
    </div>

    <div class="form-group">
        <label for="autor"> Autor </label>
        <select id="autor" name="autor" class="form-control"  value="{{old('autor')}}">
            <option {{( old('autor') && old('autor') == 'N' ? 'selected' : '' ) }} value="N">Não</option>
            <option {{( old('autor') && old('autor') == 'S' ? 'selected' : ''  )  }} {{( !old('autor')) ? 'selected' : ''  }} value="S">Sim</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password"> Senha </label>
        <input type="password" class="form-control" value="{{old('password')}}" id="password" name="password" />
    </div>
   </formulario> 

   <span slot="botoes">
       <button form="formAdicionar" class="btn btn-info">Adicionar</button> 
   </span>
  
</modal><!-- FIM MODAL ADICIONAR-->

<modal nome="editar" titulo="Editar"><!-- INICIO MODAL EDITAR-->
  <formulario id="formEditar" css="" v-bind:action="'/admin/autores/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">

    <div class="form-group">
        <label for="name"> Nome </label>
        <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome" />
    </div>

    <div class="form-group">
        <label for="email"> E-mail </label>
        <input type="email" class="form-control" id="email" name="email" v-model="$store.state.item.email" placeholder="E-mail" />
    </div>

    <div class="form-group">
        <label for="autor"> Autor </label>
        <select id="autor" name="autor" class="form-control"  v-model="$store.state.item.autor">
            <option value="N">Não</option>
            <option value="S">Sim</option>
        </select>
    </div>

    <div class="form-group">
        <label for="data"> Senha </label>
        <input type="password" class="form-control" id="password" name="password" />
    </div>
  </formulario>

  <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button> 
  </span>

</modal><!-- FIM MODAL EDITAR-->


<modal nome="detalhe" v-bind:titulo="$store.state.item.name"><!-- INICIO MODAL DETALHE-->
  <p>@{{$store.state.item.email}}</p>
</modal><!-- FIM MODAL DETALHE-->

@endsection
