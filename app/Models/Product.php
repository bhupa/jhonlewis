<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
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


    protected $table='product';

    protected $fillable =[
        'title',
        'slug',
        'is_active',
        'product_number',
        'created_by',
        'lens_id',
        'sunglass_id',
        'glass_id',
        'frame_id',
        'frame_category_id',
        'discount_id',
        'description',
        'image',
        'price',
        'warranty',
        'shape',
        'size',
        'style',
        'shipping',


    ];

    public function author(){
        return $this->belongsTo(User::class,'create_by');
    }
    public function frame(){
        return$this->belongsTo(Frame::class,'frame_id');
    }
    public function category(){
        return $this->belongsTo(FrameCategory::class,'frame_category_id');
    }
    public function stocks(){
        return $this->hasMany(Stock::class,'product_id')->where('is_active');
    }
    public function discount(){
        return $this->belongsTo(Discount::class,'discount_id');
    }
    public function glasses(){
        return $this->belongsTo(Glasses::class,'glass_id');
    }
    public function brand(){
        return $this->belongsTo(Sunglasses::class,'sunglass_id');
    }
    public function lenses(){
        return $this->belongsTo(Lenses::class,'lens_id');
    }
}
