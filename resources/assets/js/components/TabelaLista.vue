<template>
<div>
  
     <div class="form-inline">
        <modallink tipo="button" nome="meuModalTeste" titulo="Criar" css=""></modallink>
         <div class="form-group pull-right"> 
             <input type="search" placeholder="Buscar" class="form-control" v-model="buscar">
         </div>
     </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th style="cursor:pointer" v-on:click="ordenarColuna(index)" v-for="(titulo,index) in titulos" v-bind:key="titulo.id">{{titulo}}</th>
            <th v-if="detalhe || editar || deletar">Ação</th>
        </tr>
        </thead>

        <tbody>
            <tr v-for="(item,index) in lista" v-bind:key="item.id">
                <td v-for="i in item" v-bind:key="i.id">{{i}}</td>
                
                <td v-if="detalhe || editar || deletar">
                    <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                        <input type="hidden" name="_method" value="DELETE"/>
                        <input type="hidden" name="_token" v-bind:value="token"/>
                    
                    <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                    <a v-if="editar" v-bind:href="editar">Editar |</a>
                    <a href="#" v-on:click="executarForm(index)">Deletar</a>
                    </form>

                    <span v-if="!token"> 
                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                        <a v-if="editar" v-bind:href="editar">Editar |</a>
                        <a v-if="deletar" v-bind:href="deletar">Deletar</a>
                    </span>

                    <span v-if="!token && !deletar"> 
                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                        <a v-if="editar" v-bind:href="editar">Editar |</a>
                    </span>
                  
                </td>
             </tr>
         </tbody>
    </table>
</div>
</template>

<script>
    export default {
      props: ['titulos','itens','ordem','ordemcol','criar','detalhe','editar','deletar','token'],
      data: function (){
          return {
              buscar : '',
              ordemAux: this.ordem || 'asc',
              ordemAuxCol: this.ordemcol ||  0
          }
      },
      methods:{
            executarForm: function (index){
                document.getElementById(index).submit();
            },
            ordenarColuna : function(coluna){
                this.ordemAuxCol = coluna;
                if(this.ordemAux.toLowerCase() == "asc"){
                    this.ordemAux = 'desc';
                }else{
                    this.ordemAux = 'asc';
                }
            }
        },
        computed:{
            lista: function(){

                let ordem = this.ordemAux || "asc";
                let ordemCol = this.ordemAuxCol || 0;
                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == "asc"){
                    this.itens.sort(function ( a , b ){
                        if(a[ordemCol] > b[ordemCol]) {return 1;}
                        if(a[ordemCol] < b[ordemCol]) {return -1;} //crescente
                        return 0;
                    });
                }else{
                    this.itens.sort(function ( a , b ){
                        if(a[ordemCol] < b[ordemCol]) {return 1;}
                        if(a[ordemCol] > b[ordemCol]) {return -1;}//decrescente
                        return 0;
                    });
                }

            }
        },
        computed:{
            lista: function(){
                return this.itens.filter(res => {
                    
                    for(let k = 0 ; k < res.length; k ++){

                        if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                         return true;
                        }
                    }
                    return false;
                });
            }
        }
    }
</script>
