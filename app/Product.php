<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Retorna a loja que possui esse produto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
