<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table='transaction';

    protected $fillable =[
      'order_id' ,
      'paypal_id',

    ];

    public function sales(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
