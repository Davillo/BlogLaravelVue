@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <painel titulo="Artigos">
        
        <div class="row">
            @foreach ($lista as $key => $value)
                <artigocard
                titulo="{{$value->titulo}}"
                descricao="{{$value->texto}}"
                link="#"
                imagem="https://www.google.com.br/imgres?imgurl=https%3A%2F%2Fwww.volvopenta.com.br%2Fcontent%2Fdam%2Fvolvo%2Fvolvo-penta%2Fmaster%2Fbrand%2FHome%2Fcontact%2F1860x1050-brand-logs.jpg%2F_jcr_content%2Frenditions%2F1860x1050-brand-logs-teaser2.jpg&imgrefurl=https%3A%2F%2Fwww.volvopenta.com.br%2Fbrand%2Fpt-br%2Fnews-media%2Fimages-videos.html&docid=GJU8NdorO1jE0M&tbnid=a7kiDa5KVAiy9M%3A&vet=1&w=563&h=318&source=sh%2Fx%2Fim"
                data="{{$value->data}}"
                autor="{{$value->user}}"
                sm="6"
                md="4"
                ></artigocard>
            @endforeach
           
          </div>

    </painel>
</pagina>
@endsection
