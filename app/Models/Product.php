<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'category_id',
    ];

    /** Get all products associated to this category */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
