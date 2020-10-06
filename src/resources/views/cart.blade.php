@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center form-title-customized">Carrinho de compras</h1>
            <hr>
        </div>
        <div class="col-12">
            @if($cart)
                <table class="table" id="my-table">
                    <thead class="table-red">
                    <tr>
                        <th class="th-no-border">Produto</th>
                        <th class="th-no-border">Preço</th>
                        <th class="th-no-border">Quantidade</th>
                        <th class="th-no-border">Subtotal</th>
                        <th class="th-no-border">Opções</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php $total = 0; @endphp

                    @foreach($cart as $c)
                        <tr>
                            <td class="th-no-border">{{$c['name']}}</td>
                            <td class="th-no-border">R$ {{$c['price']}}</td>
                            <td class="th-no-border">{{$c['amount']}}</td>

                            @php
                                $subtotal = $c['price'] * $c['amount'];
                                $total += $subtotal;
                            @endphp

                            <td class="th-no-border">R$ {{number_format(($subtotal), 2, ',', '.')}}</td>
                            <td class="td-no-border" width="15%">
                                <div class="row btn-options">
                                    <a href="{{route('cart.remove', ['slug' => $c['slug']])}}" class="btn btn-delete">Remover &nbsp;<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Total:</td>
                        <td colspan="1"> R$ {{number_format(($total), 2, ',', '.')}}</td>
                        <td></td> {{-- Não remover --}}
                    </tr>
                    </tbody>
                </table>
                <hr>
                <a href="{{route('checkout.index')}}" class="btn btn-confirmar-compra float-right">Confirmar a compra</a>
                <a href="{{route('cart.cancel')}}" class="btn btn-desistir-compra float-left">Desistir da compra</a>

            @else
                <div class="alert alert-warning">Carrinho vazio...</div>
            @endif
        </div>
    </div>
@endsection
