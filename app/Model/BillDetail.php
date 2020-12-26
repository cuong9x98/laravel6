<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_details";

   	public function name_product()
    {
        return $this->hasOne('App\Model\Product','id','product_id');
    }
}
