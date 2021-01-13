<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailCart extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'price',
        'quantity'
    ];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transactions(){
        return $this->hasMany(Transactions::class, 'cart_id', 'id');
    }

    public function detailTransactions(){
        return $this->hasMany(DetailTransaction::class, 'cart_id', 'id');
    }

    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }
}
