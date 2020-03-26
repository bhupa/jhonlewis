<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected $table='banner';
    protected $fillable =[
        'title',
        'create_by',
        'slug',
        'is_active',
        'image',
        'short_description',
    ];

    public function author(){
        return $this->belongsTo(User::class,'create_by');
    }


}
