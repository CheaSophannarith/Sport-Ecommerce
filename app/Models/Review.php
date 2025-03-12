<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'product_id',
        'user_id',
        'title',
        'content',
        'rating',
        'is_approved',
    ];

    /**
     * each review belongs to a product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */

    public function product(){

        return $this->belongsTo(Product::class);

    }

    /**
     *
     * each review belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */

    public function user(){

        return $this->belongsTo(User::class);

    }

    /**
     *
     * convert created at to human readable format
     *
     * @return string
     *
     */

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
    
}
