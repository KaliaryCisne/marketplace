<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    /**
     * Retorna a loja que possui esse produto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Retorna as categorias do produto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }


}
