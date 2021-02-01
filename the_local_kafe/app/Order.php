<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $primaryKey = "order_id";
    protected $fillable = ['order_address', 'order_total', 'order_description', 'order_user'];

    public function user() {
        return $this->belongsTo('App\Product', 'order_user', 'user_id');
    }

    public function order_detail() {
        return $this->hasMany('App\OrderDetail', 'detail_order', 'order_id');
    }

    public function order_status() {
        return $this->belongsTo('App\OrderStatus', 'order_status', 'status_id');
    }
}
