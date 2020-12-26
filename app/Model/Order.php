<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="orders";

      public function customers()
    {
        return $this->hasOne('App\Model\Customer','id','customer_id');
    }
}
