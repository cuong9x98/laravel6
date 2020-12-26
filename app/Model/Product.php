<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

     public function productlines()
    {
        return $this->hasOne('App\Model\Productline','id','productline_id');
    }
}
