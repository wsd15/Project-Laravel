<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        // 'pizza_id',
        'name',
        'image',
        'description',
        'price'
    ];

    protected $table = 'pizzas';

    public $primaryKey = 'id';
    
    public $timestamps = false;

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'cart_id', 'id');
    }

    public function detailTransactions(){
        return $this->hasMany(DetailTransaction::class, 'cart_id', 'id');
    }

    public function detailCarts(){
        return $this->hasMany(DetailCart::class, 'cart_id', 'id');
    }
}
