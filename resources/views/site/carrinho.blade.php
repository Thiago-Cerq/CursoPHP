@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">
    
    @if($mensagem = session('sucesso'))
        
    <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Parabéns!</span>
          <p>{{ $mensagem }}</p>
        </div>
        <div class="card-action">
        </div>
    </div>
    @endif

    @if($mensagem = session('aviso'))
        
        <div class="card blue darken-1">
            <div class="card-content white-text">
            <span class="card-title">Tudo bem!</span>
            <p>{{ $mensagem }}</p>
            </div>
            <div class="card-action">
            </div>
        </div>
    @endif

    @if (count($itens) == 0)
        <div class="card orange darken-1">
            <div class="card-content white-text">
            <span class="card-title">Seu carrinho está vazio!</span>
            <p>Aproveite para adicionar produtos ao seu carrinho!</p>
            </div>
            <div class="card-action">
            </div>
        </div>
    @else
        <h3>Seu carrinho possui {{ count($itens) }} produtos.</h3>

        <table class="striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($itens as $item)
                    <tr>
                        <td><img src="{{ $item['attributes']['image'] ?? '' }}" alt="{{ $item['name'] }}" width="70" class="responsive-img circle"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                        
                        {{-- BTN Atualizar --}}
                        <td>
                            <form action="{{ route('site.atualizarCarrinho') }}" method="POST" enctype="multipart/form-data" class="inline-flex valign-wrapper">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <input class="center" style="width: 40px;" type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                <button type="submit" class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                            </form>
                        </td>
                        
                        {{-- BTN Remover--}}
                        <form action="{{ route('site.removerCarrinho') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <input type="hidden" name="id" value="{{ $item['id'] }}">   
                        <td><button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @php
            $total = array_sum(array_map(fn ($item) => (float) $item['price'] * (int) $item['quantity'], $itens));
        @endphp

        <div class="card green darken-1">
            <div class="card-content white-text">
            <span class="card-title"> R$ {{ number_format($total, 2, ',', '.') }}</span>
            <p> Pague em até 12x sem juros!</p>
            </div>
            <div class="card-action">
            </div>
        </div>
        <h3>Valor total: </h3>
    @endif


    <div class="row container center">
        <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></a>
        
        <a href="{{ route('site.limparCarrinho') }}" class="btn waves-effect waves-light blue">Limpar Carrinho<i class="material-icons right">clear</i></a>
        
        <button class="btn waves-effect waves-light green">Finalizar Compra<i class="material-icons right">check</i></button>
    </div>
</div>

@endsection
