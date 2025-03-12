<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'name',
        'slug',
        'qty',
        'price',
        'description',
        'thumbnail',
        'first_image',
        'second_image',
        'third_image',
        'status',
        'brand_id',
        'category_id',
    ];

    /**
     * each product belongs to a category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * each product belongs to a brand
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * each product has many colors
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */

    public function colors(){

        return $this->belongsToMany(Color::class);

    }

    /**
     * each product has many sizes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */

    public function sizes(){

        return $this->belongsToMany(Size::class);

    }

    /**
     * each product has many reviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */

    public function reviews(){

        return $this->hasMany(Review::class)
                    ->with('user')
                    ->where('is_approved', 1)
                    ->latest();

    }

    /**
     *
     * get route key name
     *
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
