<?php

namespace App\Listeners;

use App\Events\CreatedProduct;
use Illuminate\Support\Facades\Log;


class RegisterLogProduct
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
     * @param  CreatedProduct  $event
     * @return void
     */
    public function handle(CreatedProduct $event)
    {
        //Registra log
        Log::info($event->product());
    }
}
