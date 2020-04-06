<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='order';

    protected $fillable =[
        'buyer_id',
        'serial_number',
        'received',
        'return',
        'total_item',
        'total_amount',
        'shipping_amount'
    ];
    public function buyer(){
        return $this->belongsTo(User::class,'buyer_id');
    }
    public function shipping(){
        return $this->hasOne(Shipping::class,'order_id');
    }
    public function sales(){
        return $this->hasMany(SalesReport::class,'order_id');
}
}
