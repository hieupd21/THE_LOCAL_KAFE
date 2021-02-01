<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password', 'phone', 'provider', 'provider_id', 'role'];

    public function role() {
        return $this->belongsTo('App\Role', 'role', 'role_id');
    }

    public function order() {
        return $this->hasMany('App\Order', 'order_user', 'user_id');
    }

    public function comment() {
        return $this->hasMany('App\Comment', 'cmt_user', 'id');
    }
}
