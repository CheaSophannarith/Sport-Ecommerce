<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     *
     * category has many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */

    public function products()
    {

        return $this->hasMany(Product::class);

    }

    /**
     *
     * get route key name by slug
     *
     *
     * @return string
     */

    public function getRouteKeyName(): string
    {

        return 'slug';

    }
}
