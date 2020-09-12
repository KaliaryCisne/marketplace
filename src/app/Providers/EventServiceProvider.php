<?php

namespace App\Providers;

use App\Events\CreatedProduct;
use App\Events\ProductUpdated;
use App\Listeners\ProductUpdatedListener;
use App\Listeners\RegisterLogProduct;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CreatedProduct::class => [
          RegisterLogProduct::class,
        ],
        ProductUpdated::class => [
            ProductUpdatedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
