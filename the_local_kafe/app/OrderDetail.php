<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "orders_detail";
    protected $primaryKey = "detail_id";
    protected $fillable = ['detail_price', 'detail_quantity', 'detail_prod', 'detail_order'];

    public function product() {
        return $this->belongsTo('App\Product', 'detail_prod', 'prod_id');
    }

    public function order() {
        return $this->belongsTo('App\Order', 'detail_order', 'order_id');
    }
}
