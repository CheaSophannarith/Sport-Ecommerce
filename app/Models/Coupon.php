<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    /** @use HasFactory<\Database\Factories\CouponFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'code',
        'discount',
        'valid_until',
    ];

    /**
     * convert the attributes code to uppercase.
     *
     * @return void
     */

    public function setCodeAttribute($value)
    {

        $this->attributes['code'] = strtoupper($value);

    }

    /**
     * Check if the coupon is not expired.
     *
     * @return bool
     */

    public function isValid(): bool
    {

        if($this->valid > now()){

            return true;

        }else{

            return false;

        }

    }

}
