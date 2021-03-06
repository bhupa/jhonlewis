<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lenses extends Model
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


    protected $table='lenses';
    protected $fillable =[
        'name',
        'slug',
        'is_active',
        'created_by'
    ];
}
