<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'orders_status';
    protected $primaryKey = 'status_id';
    protected $fillable = ['status_name'];

    public function order() {
        return $this->hasMany('App\Order', 'order_status', 'status_id');
    }
}
