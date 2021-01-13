<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        // 'pizza_id',
        'date',
        'price',
        'quantity'
    ];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function pizza(){
    //     return $this->belongsTo(Pizza::class, 'pizza_id', 'id');
    // }

    public function transactions(){
        return $this->hasMany(Transactions::class, 'cart_id', 'id');
    }

    public function detailTransactions(){
        return $this->hasMany(DetailTransaction::class, 'cart_id', 'id');
    }

    public function detailCarts(){
        return $this->hasMany(DetailCart::class, 'cart_id', 'id');
    }
}
