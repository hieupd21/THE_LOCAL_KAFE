<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'role_id';
    protected $fillable = ['role_name'];

    public function user() {
        return $this->hasMany('App\User', 'role', 'role_id');
    }
}
