<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'user_id',
        'coupon_id',
        'qty',
        'total_price',
        'delivery_date'
    ];

    /**
     *
     * Order belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     *
     */

    public function user(){

        return $this->belongsTo(User::class);

    }

    /**
     *
     * Order belongs to a coupon.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     *
     */

    public function coupon(){

        return $this->belongsTo(Coupon::class);

    }

    /**
     *
     * convert created at to human readable format.
     *
     * @return string
     *
     */

    public function getCreatedAtAttribute($value): string
    {

        return Carbon::parse($value)->diffForHumans();

    }

    
}
