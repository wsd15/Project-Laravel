<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'pizza_id',
        'cart_id',
        'total_qty',
        'total_price'
    ];

    public function pizza(){
        return $this->belongsTo(Pizza::class, 'pizza_id', 'id');
    }

    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function detailCarts(){
        return $this->belongsTo(DetailCart::class, 'cart_id', 'id');
    }
}
