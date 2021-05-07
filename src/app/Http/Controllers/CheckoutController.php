<?php

namespace App\Http\Controllers;

use App\payment\PagSeguro\CreditdCard;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
//        session()->forget('pagseguro_session_code');
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->makePagSeguroSession();

        $cartItems = array_map(function ($line) {
            return $line['amount'] * $line['price'];
        }, session()->get('cart'));

        $cartItems = array_sum($cartItems);

        return view('checkout', compact('cartItems'));
    }

    public function proccess(Request $request)
    {
        $dataPost = $request->all();
        $user = auth()->user();
        $cardItems = session()->get('cart');
        $reference = 'XPTO';

        $creditCardPayment = new CreditdCard($cardItems, $user, $dataPost, $reference);
        $result = $creditCardPayment->doPayment();

        $userOrder = [
          'reference' => $reference,
          'pagseguro_code' => $result->getCode(),
          'pagseguro_status' => $result->getStatus(),
          'items' => serialize($cardItems),
          'store_id' => 2
        ];

        $user->orders()->create($userOrder);

        return response()->json([
            'data' => [
                'status' => true,
                'message' => 'Pedido criado com sucesso!'
            ]
        ]);

    }

    private function makePagSeguroSession()
    {
        if (!session()->has('pagseguro_session_code')) {
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );

            session()->put('pagseguro_session_code', $sessionCode->getResult());
        }

    }
}
