<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FrameCategory extends Model
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

    protected $table='frame_category';

    protected $fillable =[
        'name',
        'slug',
        'is_active',
        'created_by',
        'frame_id'
    ];

    public function frame(){
        return $this->belongsTo(Frame::class,'frame_id');
    }
}
