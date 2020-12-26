<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";

    protected $fillable = [
        'name'
    ];
    
    public function produclines()
    {
        return $this->hasMany(Productline::class,'brand_id','id');
    }
}
