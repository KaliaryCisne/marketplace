<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

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
        $user = auth()->user()->name;

        Log::info($user);

    }
}
