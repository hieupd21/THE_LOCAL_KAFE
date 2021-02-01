<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $primaryKey = "cmt_id";
    protected $fillable = ["cmt_content", "cmt_user", "cmt_prod"];

    public function user() {
        return $this->belongsTo('App\User', 'cmt_user', 'id');
    }

    public function product() {
        return $this->belongsTo('App\Product', 'cmt_prod', 'prod_id');
    }
}
