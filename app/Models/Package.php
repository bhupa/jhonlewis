<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
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


    protected $table='package';

    protected $fillable =[
        'title',
        'create_by',
        'slug',
        'is_active',
        'description',
        'image',
        'short_description',
        'start_date',
        'end_date'
    ];

    public function author(){
        return $this->belongsTo(User::class,'create_by');
    }

}
