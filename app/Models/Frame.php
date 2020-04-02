<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Frame extends Model
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


    protected $table='frames';





    protected $fillable =[
        'name',
        'slug',
        'is_active',
        'created_by'


    ];

    public function category(){
        return $this->hasMany(FrameCategory::class,'frame_id');
    }
}
