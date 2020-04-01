<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
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


    protected $table='discount';





    protected $fillable =[
        'title',
        'image',
        'short_description',
        'slug',
        'is_active',
        'created_by',
        'percentage'
    ];
    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
}
