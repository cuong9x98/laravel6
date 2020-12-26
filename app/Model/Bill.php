<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    public function providers()
    {
        return $this->hasOne('App\Model\Provider','id','provideder_id');
    }

  
}
