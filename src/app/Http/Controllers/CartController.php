<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];

        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = $request->get('product');

        if (session()->has('cart')) {
            //Existindo, adiciono este produto na sessao existente
            session()->push('cart', $product);
        } else {
            //Não existindo eu cria esta sessão com o primeiro produto
            $products[] = $product;

            session()->put('cart', $products);
        }

        flash('Produto adicionado no carrinho!')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);
    }
}
