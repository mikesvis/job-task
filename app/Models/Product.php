<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    /**
     * Categories that belong to the product
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
