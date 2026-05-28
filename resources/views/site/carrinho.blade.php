@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">
    <h3>Seu carrinho</h3>

    @if($itens->isEmpty())
        <p>Seu carrinho está vazio.</p>
    @else
        <ul class="collection">
            @foreach($itens as $item)
                <li class="collection-item avatar">
                    <img src="{{ $item->attributes->image ?? '' }}" alt="" class="circle">
                    <span class="title">{{ $item->name }}</span>
                    <p>Qtd: {{ $item->quantity }}<br>
                       Preço: R$ {{ number_format($item->price, 2, ',', '.') }}
                    </p>
                </li>
            @endforeach
        </ul>
    @endif
</div>

@endsection
