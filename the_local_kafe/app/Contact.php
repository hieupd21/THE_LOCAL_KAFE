<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";
    protected $primaryKey = "cont_id";
    protected $fillable = ["cont_name", "cont_email", "cont_description"];
}
