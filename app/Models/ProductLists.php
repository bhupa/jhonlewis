<?php

namespace App\Models;

use App\Repositories\BrandRepository;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductLists extends Model
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


    protected $table='shop_product_lists';





    protected $fillable =[
        'name',
        'created_by',
        'brand_id',
        'slug',
        'is_active',
        'image',
        'model',
        'short_description',
        'type'
    ];

    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function category(){
        return $this->belongsTo(BlogCategorie::class,'category_id');
    }
    public function brands(){
        return $this->BelongsTo(Brand::class,'brand_id');
    }
}

