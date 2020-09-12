<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use App\ProductLog;
use Illuminate\Support\Facades\Log;

class ProductUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ProductUpdated $event)
    {
        $product = $event->product();
        $store = $product->store();
        $user = auth()->user();

        $log_product = ProductLog::create([
            'name_new' => $product->name,
            'description_new' => $product->description,
            'body_new' =>  $product->body,
            'price_new' =>  $product->price,
            'slug_new' =>  $product->slug,
            'product_id' => $product->id,
            'store_id' => $product->store_id,
            'user_name' => $user->name,
            'user_id' => $user->id,
            'action' => "updated",
        ]);

        Log::info("Produto atualizado: ");
//        dd($store);
        Log::info($product);

    }
}
