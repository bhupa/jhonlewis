<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{


    protected $table ='shipping_address';

    protected $fillable =[
      'order_id',
      'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'street',
        'postal_code',
        'zip_code'

    ];

    public function sales(){
        return $this->hasMany(SalesReport::class,'serial_number');
    }
}
