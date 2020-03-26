<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;



    protected $table='doctor';

    protected $fillable =[
        'name',
        'created_by',
        'specalists',
        'is_active',
        'facebook',
        'image',
        'twitter',
        'linkedin'
    ];

    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
}
