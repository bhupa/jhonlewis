<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
    protected $table='sales_report';
    public $timestamps = true;
    protected  $fillable=[
      'order_id',
    'product_id',
        'stock_id',
        'unit_price',
        'price',
        'discount',
        'discount_amount',
        'dispatch',
        'return',
        'piece',
    ];

    public function buyer(){
        return $this->belongsTo(User::class,'buyer_id');
    }
    public function sales(){
        return $this->belongsTo(SalesReport::class,'serial_numbr');
    }
    public function stock(){
        return $this->belongsTo(Stock::class,'stock_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
