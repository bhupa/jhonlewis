<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;



    protected $table='appointment';

    protected $fillable =[
        'firstname',
        'lastname',
        'user_id',
        'email',
        'address',
        'phone',
        'date'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
