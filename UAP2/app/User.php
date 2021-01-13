<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','phone','gender','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';

    public $primaryKey = 'id';
    
    public $timestamps = false;
    
    public function cart(){
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }

    public function transactions(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detailTransactions(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detailCarts(){
        return $this->hasMany(DetailCart::class, 'cart_id', 'id');
    }
}
