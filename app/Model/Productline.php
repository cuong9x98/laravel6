<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Productline extends Model
{
    protected $table = "productlines";
    
    public function brands()
    {
        return $this->hasOne('App\Model\Brand','id','brand_id');
    }
}
