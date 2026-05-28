@extends('site.layout')
@section('title', 'Home')
@section('conteudo')

    <div class="container">
        <div class="row">

            @foreach($produtos as $produto)

                <div class="col s12 m4">
                    <div class="card">
                        
                        <div class="card-image">
                            <img src="{{($produto->imagem)}}">  
                            <a href="{{route('site.details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light red">
                                <i class="material-icons">visibility</i>
                            </a>
                        </div>
                        
                        <div class="card-content">
                            <span class="card-title">{{ \Illuminate\Support\Str::limit($produto->nome, 20) }}</span>
                            <p>{{ \Illuminate\Support\Str::limit($produto->descricao, 20) }}</p>
                        </div>
                        
                    </div>
                </div> @endforeach
                
            
        </div>
        <div class="row center">
            {{ $produtos->links('custom.pagination')}}
        </div>        


 </div> @endsection