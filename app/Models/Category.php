<?php

namespace App\Models;

use App\Models\Product;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'parent_id'];

    /**
     * Products that belong to the category
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
