<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = \Cart::getContent();

        return view('site.carrinho', compact('itens'));
    }

    public function adicionarCarrinho(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => (float) $request->price,
            'quantity' => (int) $request->qnt,
            'attributes' => ['image' => $request->image],
        ]);

        return redirect()->route('site.carrinho');
    }
}
