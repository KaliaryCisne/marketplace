<?php

namespace App;

use App\Events\ProductUpdated;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{

    use HasSlug;
    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

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

    protected $dispatchesEvents = [
        'updated' => ProductUpdated::class,
    ];

}
