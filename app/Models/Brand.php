<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    protected $table='brand';
    protected $fillable =[
        'name',
        'created_by',
        'slug',
        'is_active',
        'image',
        'short_description',
        'description',
        'type',
        'selling'
    ];

    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
}
