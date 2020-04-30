<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'tour_id',
        'slug',
        'is_active',
        'image',
        'model'
    ];

    public function author(){
        return $this->belongsTo(User::class,'create_by');
    }

    public function category(){
        return $this->belongsTo(BlogCategorie::class,'category_id');
    }
}
