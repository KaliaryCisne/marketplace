<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
    protected $table = "product_log";

    protected $fillable = [
        'name_old',
        'description_old',
        'body_old',
        'price_old',
        'slug_old',

        'name_new',
        'description_new',
        'body_new',
        'price_new',
        'slug_new',

        'product_id',
        'store_id',
        'user_name',
        'user_id',
        'action',
    ];
}
