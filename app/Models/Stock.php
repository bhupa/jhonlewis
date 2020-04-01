<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected $table='stock';
    protected $fillable =[
        'title',
        'slug',
        'is_active',
       'product_id',
        'color_id',
        'image',
        'piece'
    ];

    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function color(){
        return $this->belongsTo(Color::class,'color_id')->orderBy('name');
    }
}
