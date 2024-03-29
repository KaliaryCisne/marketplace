<?php

namespace App\Http\Controllers;

use App\Product;
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
        $productData = $request->get('product');
        $product = Product::whereSlug($productData['slug']);
        if(!$product->count() || $productData['amount'] == 0) return redirect()->route('home');
        $product = array_merge($productData, $product->first(['name', 'price', 'store_id'])->toArray());

        if (session()->has('cart')) {
            $products = session()->get('cart');
            $productsSlugs = array_column($products, 'slug');

            if(in_array($product['slug'], $productsSlugs)) {

                $products = $this->productIncrement($product['slug'], $product['amount'], $products);

                session()->put('cart', $products);
            } else {
                session()->push('cart', $product);
            }

        } else {
            //Não existindo eu cria esta sessão com o primeiro produto
            $products[] = $product;
            session()->put('cart', $products);
        }

        flash('Produto adicionado no carrinho!')->success();
        return redirect()->route('home');
    }

    public function remove($slug)
    {
        if(!session()->has('cart'))
            return redirect()->route('cart.index');

        $products = session()->get('cart');

        $products = array_filter($products, function ($line) use($slug) {
           return $line['slug'] != $slug;
        });

        session()->put('cart', $products);
        return redirect()->route('cart.index');
    }

    public function cancel()
    {
        session()->forget('cart');

        flash('Esperamos que em breve encontre produtos que lhe agrade <3')->success();
        return redirect()->route('home');
    }

    private function productIncrement($slug, $amount, $products)
    {
        $products = array_map(function ($line) use($slug, $amount) {
            if($slug === $line['slug']) {
                $line['amount'] += $amount;
            }
            return $line;
        }, $products);

        return $products;
    }
}
