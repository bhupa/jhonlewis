<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{


    protected $table='notification';





    protected $fillable =[
        'sender_id',
        'receiver_id',
        'view',
        'order_id',
        'link',
        'message'


    ];


    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }
    public function receiver(){
        return $this->belongsTo(User::class,'receiver_id');
    }

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
