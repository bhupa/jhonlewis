<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;



    protected $table='testimonial';

    protected $fillable =[
        'created_by',
        'service_id',
        'is_active',
        'description',
    ];

    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
}
