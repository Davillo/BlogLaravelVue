@extends('layouts.app')

@section('content')
<pagina tamanho="12">

    <painel titulo="Lista de artigos">
        <tabela-lista 
        v-bind:titulos="['#','Título','Descrição']"
        v-bind:itens="[[1,'PHP','CURSO DE PHP OO'], [2,'VUE JS','CURSO DE VUE JS']]"
        criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="1234567"
        ></tabela-lista>

    </painel>
</pagina>
@endsection
