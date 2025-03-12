<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
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
     * Brand has many products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */

    public function products(){

        return $this->hasMany(Product::class);

    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
