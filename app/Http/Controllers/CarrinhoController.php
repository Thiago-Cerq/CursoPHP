<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = session('carrinho', []);

        return view('site.carrinho', compact('itens'));
    }

    public function adicionarCarrinho(Request $request)
    {
        $carrinho = session('carrinho', []);
        $item = [
            'id' => (int) $request->id,
            'name' => $request->name,
            'price' => (float) $request->price,
            'quantity' => (int) $request->qnt,
            'attributes' => ['image' => $request->image],
        ];

        $index = collect($carrinho)->search(fn ($produto) => (int) $produto['id'] === (int) $request->id);

        if ($index !== false) {
            $carrinho[$index]['quantity'] += (int) $request->qnt;
        } else {
            $carrinho[] = $item;
        }
        

        session(['carrinho' => $carrinho]);
        //redirecionando para a rota do carrinho
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado ao carrinho!');
    }

    public function removerCarrinho(Request $request)
    {
        $carrinho = session('carrinho', []);

        $carrinho = array_values(array_filter($carrinho, function ($item) use ($request) {
            return (int) $item['id'] !== (int) $request->id;
        }));

        session(['carrinho' => $carrinho]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho!');
    }

    public function atualizarCarrinho(Request $request)
    {
        $carrinho = session('carrinho', []);

        $index = collect($carrinho)->search(fn ($item) => (int) $item['id'] === (int) $request->id);

        if ($index !== false) {
            $carrinho[$index]['quantity'] = max(1, (int) $request->quantity);
            session(['carrinho' => $carrinho]);
        }

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado no carrinho!');
    }

    public function limparCarrinho()
    {
        session()->forget('carrinho');
        return redirect()->route('site.carrinho')->with('aviso', 'Carrinho esta vazio!!!');
    }
}
